<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                            
        <title>Laravel</title>
                            
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
                            
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body >
        @if(Auth::check())
            <div style="float: right;">
                <span>Bienvenido, {{ Auth::user()->id_usuario }}</span> |
                <span>Última conexión: {{ request()->cookie('last_login') ?? '-- --:--:--' }}</span> |
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        @endif

        @yield('content')
    </body>
</html>
                            