@extends('app')
@section('content')
    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif
    <style>
        main {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <main class="login-form">
        <div class="container">
            <h1>Bienvenido</h1>
            <p>Elige una opción:</p>
            <button onclick="window.location='{{ route('showLogin') }}'">Iniciar Sesión</button>
            <button onclick="window.location='{{ route('showRegister') }}'">Registrarse</button>
        </div>
    </main>
@endsection