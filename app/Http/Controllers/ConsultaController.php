<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function create()
    {
        return view('consultas.formulario');
    }

    public function buscar(Request $request)
{
    $request->validate([
        'NumDocumento' => 'required',
    ]);

    $resultados = Usuario::query()
        ->leftJoin('encuesta', 'usuario.idUsuario', '=', 'encuesta.idUsuario')
        ->leftJoin('nucleofamiliar', function($join) {
            $join->on('encuesta.idUsuario', '=', 'nucleofamiliar.idUsuario')
                 ->on('encuesta.idEncuesta', '=', 'nucleofamiliar.idEncuesta');
        })
        ->where('usuario.NumDocumento', $request->NumDocumento)
        ->select(
            'usuario.idUsuario',
            'usuario.NumDocumento',
            'encuesta.idEncuesta',
            'nucleofamiliar.idNucleoFamiliar'
        )
        ->get();

    return view('consultas.resultado', compact('resultados'));
}
}