<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
      body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
      }

      .bg-image {
        background-image: url('https://source.unsplash.com/1600x900/?nature,water');
        filter: blur(8px);
        -webkit-filter: blur(8px);
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        width: 100%;
        z-index: -1;
      }

      .content {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
      }

      .content h1 {
        font-size: 50px;
      }

      .btn-login {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="bg-image"></div>
    <div class="content">
      <h1>Welcome to Our Website!</h1>
      <p>To access your dashboard, please log in.</p>
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="btn-login">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="btn-login">Login</a>
        @endauth
      @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>
