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
    ->leftJoin('nucleofamiliar', 'usuario.idUsuario', '=', 'nucleofamiliar.idUsuario')
    ->leftJoin('encuesta', 'nucleofamiliar.idEncuesta', '=', 'encuesta.idEncuesta')
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