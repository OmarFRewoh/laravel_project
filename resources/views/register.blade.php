@extends('app')
@section('content')
    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif
    <main class="login-form">
        <h1>Registro</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="id_usuario">Username:</label>
            <input type="text" id="id_usuario" name="id_usuario" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

            <button type="submit">
                Enviar
            </button>
        </form>

        <p>
            ¿Ya tienes una cuenta?
            <a href="{{ route('showLogin') }}">
                Inicia sesión
            </a>
        </p>
    </main>
@endsection