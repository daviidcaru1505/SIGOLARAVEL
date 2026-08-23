<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Procesa el inicio de sesión para Asesores y Encuestados.
     */
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        // Limpiamos espacios alrededor del correo y contraseña
        $correoInput = trim($request->correo);
        $contrasenaInput = trim($request->contrasena);

        // Buscamos ignorando mayúsculas/minúsculas y espacios en el correo
        $usuario = Usuario::with('rol')
            ->whereRaw('LOWER(TRIM(Correo)) = ?', [strtolower($correoInput)])
            ->first();

        if ($usuario) {
            $hashGuardado = (string) $usuario->Contrasena;

            // 1. Verificación en texto plano (para los datos actuales de la BD)
            $esPlanaValida = ($hashGuardado === $contrasenaInput);

            // 2. Verificación con Hash de Laravel (Bcrypt/Argon)
            $esHashValido = false;
            if (str_starts_with($hashGuardado, '$2y$') || str_starts_with($hashGuardado, '$2b$') || str_starts_with($hashGuardado, '$2a$')) {
                $esHashValido = Hash::check($contrasenaInput, $hashGuardado);
            }

            // 3. Verificación MD5 (por si existen contraseñas antiguas migadas)
            $esMd5Valido = (md5($contrasenaInput) === $hashGuardado);

            if ($esPlanaValida || $esHashValido || $esMd5Valido) {
                // Obtener el rol desde la relación 'rol' o desde la columna 'Tipo' ('Asesor' / 'Encuestado')
                $rolNombre = $usuario->rol->Nombre ?? $usuario->Tipo;

                // Guardamos en sesión (en minúsculas para compatibilidad con Middleware de roles)
                session([
                    'usuario_id'     => $usuario->idUsuario,
                    'usuario_nombre' => $usuario->Nombre,
                    'usuario_rol'    => strtolower(trim($rolNombre)), 
                ]);

                return redirect()->route('principal')->with('exito', 'Bienvenido ' . $usuario->Nombre);
            }
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