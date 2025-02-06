@extends('app')
@section('content')
    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif
    <main class="d-flex text-center flex-column min-vh-100 align-items-center justify-content-center">
        <h1 class="mb-3">Iniciar sesión</h1>
        <form action="{{ route('login') }}" method="POST" class="border border-success rounded p-3 pt-4 black">
            @csrf
            <label for="id_usuario">Id de usuario:</label>
            <input type="text" id="id_usuario" name="id_usuario" class="rounded border border-1 border-secondary" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="rounded border border-1 border-secondary" required><br><br>

            <button type="submit" class="btn btn-secondary mb-2">
                Iniciar Sesión
            </button>
        </form>

        <p class="mt-2">
            ¿No tienes una cuenta?
            <a href="{{ route('showRegister') }}">
                Regístrate
            </a>
        </p>
    </main>
@endsection