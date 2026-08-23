<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la portada/página pública (ruta /)
     */
    public function index()
    {
        return view('home.index'); // O la vista de inicio que tengas en resources/views/home/
    }

    /**
     * Evalúa el rol tras iniciar sesión y redirecciona (ruta /principal)
     */
    public function principal()
    {
        $rol = strtolower(session('usuario_rol'));

        if ($rol === 'encuestado') {
            return redirect()->route('encuestado.puntaje');
        }

        return view('home.principal');
    }
}