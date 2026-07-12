<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f8f9fa; color: #333; }
        nav { background-color: #2c3e50; padding: 15px 30px; display: flex; gap: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        nav a { color: #ecf0f1; text-decoration: none; font-weight: 600; font-size: 16px; transition: 0.3s; }
        nav a:hover { color: #3498db; }
        .container { max-width: 800px; margin: 40px auto; background: #fff; padding: 30px 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-top: 0; }
        p { font-size: 16px; line-height: 1.6; }
        .label { font-weight: bold; color: #7f8c8d; width: 150px; display: inline-block; }
        footer { text-align: center; margin-top: 50px; padding: 20px; color: #95a5a6; font-size: 14px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/profil') }}">Profil</a>
        <a href="{{ url('/pendidikan') }}">Pendidikan</a>
        <a href="{{ url('/keahlian') }}">Keahlian</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        &copy; {{ date('Y') }} - Praktikum Web II Laravel | Meukeuta Perkasa Syah Muhammad
    </footer>
</body>
</html>
