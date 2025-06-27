<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Maju Jaya Motor</title>


  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  {{-- Kotak Login --}}
  <div class="login-box">
    <img src="{{ asset('images/logo_fix.png') }}" class="logo" alt="Logo Maju Jaya">
    <h2>Login</h2>

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        @if (session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif

        <button type="submit">Login</button>
        </form>

        </div>

    </body>
</html>
