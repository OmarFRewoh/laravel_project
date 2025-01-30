@extends('app')
@section('content')
    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif
    <main class="login-form">
        <h1>Iniciar Sesión</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="id_usuario">Username:</label>
            <input type="text" id="id_usuario" name="id_usuario" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>

            <button type="submit">
                Iniciar Sesión
            </button>
        </form>

        <p>
            ¿No tienes una cuenta?
            <a href="{{ route('showRegister') }}">
                Regístrate
            </a>
        </p>
    </main>
@endsection