<?php

// app/Http/Controllers/Client/Auth/RegisterController.php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
         if (auth()->check()) {
            return redirect()->intended('/client/dashboard');
        }
        return view('client.auth.register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol de cliente al usuario
        $user->assignRole('cliente');

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir al dashboard del cliente
        return redirect()->route('client.dashboard');
    }
}
