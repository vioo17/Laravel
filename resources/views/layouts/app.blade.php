<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Motor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: #222;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #6b8f71;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }

        .sidebar a,
        .sidebar form button {
            margin: 20px;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            background: white;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar form {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: white;
        }

        .header {
            position: relative;
            width: 100%;
            height: 150px;
            overflow: hidden;
            border-bottom: 5px solid white;
        }

        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/images/background.jpg') center/cover no-repeat;
            filter: blur(2px);
            transform: scale(1.1);
            z-index: 1;
        }

        .header-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding-top: 50px;
        }

        .content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="{{ url('/dashboard') }}">Tambah Unit</a>
            <a href="{{ url('/pesanan') }}">Buat Pesanan</a>
            <a href="{{ url('/laporan') }}">Laporan</a>

            {{-- Tombol Logout --}}
            <form method="GET" action="{{ route('logout') }}">
                <button type="submit">Logout</button>
            </form>
        </div>

        <div class="main">
            <div class="header"></div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
