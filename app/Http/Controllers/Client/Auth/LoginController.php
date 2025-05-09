<?php

// app/Http/Controllers/Client/Auth/LoginController.php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
         if (auth()->check()) {
            return redirect()->intended('/client/dashboard');
        }
   
        return view('client.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->hasRole('cliente')) {
                return redirect()->intended('/client/dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'No tienes permiso para acceder como cliente.']);
            }
        }

        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Cierra la sesión
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken();  // Regenera el token CSRF

        // Redirige al índice (home)
        return redirect()->route('home');
    }
}

