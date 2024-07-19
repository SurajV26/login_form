@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">User Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
