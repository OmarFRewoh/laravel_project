<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    const LAST_LOGIN_LONGEVITY = 60 * 24 * 30; 

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
        if(Auth::check()) {
            return redirect('/home');
        }
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

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'id_usuario' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('id_usuario', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas']);
    }

    public function logout(Request $request)
    {
        $lastLoginTime = now()->format('d-m-Y H:i');
        $cookie = cookie('last_login', $lastLoginTime, self::LAST_LOGIN_LONGEVITY);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withCookie($cookie);
    }

    public function admin()
    {
        return view('admin');
    }
}