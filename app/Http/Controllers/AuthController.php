<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     * Reemplaza a vista/iniciosesion/frminiciosesion.php
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Procesa el inicio de sesión.
     * Reemplaza a controlador/iniciosesion/iniciosesion.php
     */
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        $usuario = Usuario::with('rol')
            ->where('Correo', $request->correo)
            ->first();

        // Soporta contraseñas ya migradas con Hash y, como respaldo,
        // contraseñas antiguas guardadas en texto plano (proyecto original).
        $credencialesValidas = $usuario && (
    $usuario->Contrasena === $request->contrasena
    || Hash::check($request->contrasena, $usuario->Contrasena)
);
        if ($credencialesValidas) {
            session([
                'usuario_id' => $usuario->idUsuario,
                'usuario_nombre' => $usuario->Nombre,
                'usuario_rol' => $usuario->rol->Nombre ?? null,
            ]);

            return redirect()->route('principal')->with('exito', 'Bienvenido ' . $usuario->Nombre);
        }

        return back()->withErrors(['login' => 'No existe esta persona o la contraseña es incorrecta.']);
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }
}
