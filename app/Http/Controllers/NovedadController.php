<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Novedad;
use Illuminate\Http\Request;

class NovedadController extends Controller
{
    /**
     * Formulario para gestionar novedades.
     * Reemplaza a vista/gestionarnovedades/formgestionarnovedades.php
     */
    public function create()
    {
        $encuestas = Encuesta::orderByDesc('idEncuesta')->get();

        return view('novedades.crear', compact('encuestas'));
    }

    /**
     * Guarda una nueva novedad asociada a una encuesta.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'idEncuesta' => 'required|integer|exists:encuesta,idEncuesta',
            'TipoNovedad' => 'required|string|max:45',
            'Descripcion' => 'required|string|max:45',
            'Fecha' => 'required|date',
            'Estado' => 'required|string|max:45',
        ]);

        $datos['idNovedades'] = (Novedad::max('idNovedades') ?? 0) + 1;

        Novedad::create($datos);

        return redirect()->route('novedades.create')->with('exito', 'Novedad registrada correctamente.');
    }
}
