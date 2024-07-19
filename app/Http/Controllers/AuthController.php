<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    } 

    public function registration(): View
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended(route('dashboard'))
                            ->with('success', 'You have successfully logged in');
        }

        return redirect(route('login'))->with('error', 'Oops! You have entered invalid credentials');
    }

    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user); 

        return redirect(route('login'))->with('success', 'Great! You have successfully registered and logged in');
    }

    public function dashboard(): View|RedirectResponse
    {
        if (Auth::check()) {
            $users = User::all(); // Fetch all users
            return view('dashboard', compact('users'));
        }

        return redirect(route('login'))->with('success', 'Oops! You do not have access');
    }

    protected function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => null, // Set to null initially; adjust according to your verification process
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        Session::flush(); // Clear all session data

        return redirect(route('login'));
    }
}
