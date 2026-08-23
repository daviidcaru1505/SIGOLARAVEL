<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Usuario;
use App\Models\NucleoFamiliar;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Muestra el formulario para crear una encuesta.
     */
    public function create(Request $request)
    {
        $idUsuario = $request->query('idUsuario');
        $usuario = null;

        if ($idUsuario) {
            $usuario = Usuario::find($idUsuario);
        }

        $usuarios = Usuario::all();

        return view('encuestas.crear', compact('usuario', 'usuarios'));
    }

    /**
     * Guarda la encuesta y asigna automáticamente el registro en nucleofamiliar.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idUsuario'           => 'required|exists:usuario,idUsuario',
            'FechaCreacion'       => 'required',
            'Estado'              => 'required',
            'Soporte'             => 'required',
            'NivelSocioeconomico' => 'nullable|string|max:3',
        ]);

        // 1. Crear Encuesta
        $encuesta = Encuesta::create([
            'idUsuario'           => $request->idUsuario,
            'FechaCreacion'       => $request->FechaCreacion,
            'Estado'              => $request->Estado,
            'Soporte'             => $request->Soporte,
            'NivelSocioeconomico' => $request->NivelSocioeconomico,
        ]);

        // 2. Crear Núcleo Familiar vinculado a la encuesta y al usuario
        NucleoFamiliar::create([
            'idUsuario'  => $request->idUsuario,
            'idEncuesta' => $encuesta->idEncuesta,
            'JefeHogar'  => '1',
        ]);

        return redirect()->route('principal')->with('exito', 'Encuesta y Núcleo Familiar creados correctamente.');
    }
}