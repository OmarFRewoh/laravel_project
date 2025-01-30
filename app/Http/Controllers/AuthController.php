<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Función que muestra la vista de home o la vista con el formulario de Login
     */
    public function index()
    {
        // Comprobamos si el usuario ya está logado
        if (Auth::check()) {

            // Si está logado le mostramos la vista de home
            return view('home');
        }

        // Si no está logado le mostramos la vista con el formulario de login
        return view('welcome');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Funcion encargada de loguear o crear el usuario
     */
    public function register(Request $request)
    {    
        $request->validate([
            'id_usuario' => 'required|unique:usuarios,id_usuario',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'id_usuario' => $request->id_usuario,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('showLogin');
    }

    public function login(Request $request)
    {
        // Comprobamos que el id_usuario y la contraseña han sido introducidos
        $request->validate([
            'id_usuario' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('id_usuario', 'password');
        // Si el usuario existe lo logamos y lo llevamos a la vista de "home" con un mensaje
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
        return back()->withErrors(['error' => 'Credenciales incorrectas']);
        
    }

    /**
     * Función que muestra la vista de home si el usuario está logado y si no le devuelve al formulario de login
     * con un mensaje de error
     */
    public function home()
    {
        if (Auth::check()) {
            return view('home');
        }

        return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
}