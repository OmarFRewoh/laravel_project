<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    @if(Auth::check())
        <div class="float-end">
            @if(Auth::user()->id_usuario === 'admin')
                <button type="button" class="btn btn-light" onclick="window.location.href='/admin'">Administrar
                    usuarios</button>
                |
            @endif
            <!-- boton para ir a listaViviendas 
             <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf <button type="submit" class="btn btn-light" >Cerrar sesión</button>
                </form> -->

            <span>Bienvenido, {{ Auth::user()->id_usuario }}</span> |
            <span>Última conexión: {{ request()->cookie('last_login') ?? '-- --:--:--' }}</span> |
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-light">Cerrar sesión</button>
            </form>
        </div>
    @endif

    @yield('content')

    @include('components.modals');
</body>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    });
</script>

</html>