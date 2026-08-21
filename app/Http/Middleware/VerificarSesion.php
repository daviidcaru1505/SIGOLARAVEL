<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarSesion
{
    /**
     * Verifica que el usuario haya iniciado sesión antes de
     * acceder a las secciones internas del sistema SIGO.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('usuario_id')) {
            return redirect()->route('login')->withErrors(['login' => 'Debe iniciar sesión para continuar.']);
        }

        return $next($request);
    }
}
