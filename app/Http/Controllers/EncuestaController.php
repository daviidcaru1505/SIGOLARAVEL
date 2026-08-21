<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Formulario para crear encuesta.
     * Reemplaza a vista/crearencuesta/formcrearencuesta.php
     */
    public function create()
    {
        return view('encuestas.crear');
    }

    /**
     * Guarda la encuesta.
     * Reemplaza a controlador/crearencuesta/crearencuesta.php
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'FechaCreacion' => 'required',
            'Estado' => 'required|string',
            'Soporte' => 'required|string',
            'NivelSocioeconomico' => 'required|string|max:3',
        ]);

        Encuesta::create($datos);

        return redirect()->route('encuestas.create')->with('exito', 'Encuesta guardada correctamente.');
    }
}
