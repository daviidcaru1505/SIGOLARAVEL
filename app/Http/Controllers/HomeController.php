<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Página de bienvenida pública.
     * Reemplaza a index.php
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Página principal luego de iniciar sesión.
     * Reemplaza a vista/pgprincipal/pgprincipal.php
     */
    public function principal()
    {
        return view('home.principal');
    }
}
