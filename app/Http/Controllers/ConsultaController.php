<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Formulario de consulta por número de documento.
     * Reemplaza a vista/consultarpersona/formconsultarpersona.php
     */
    public function create()
    {
        return view('consultas.formulario');
    }

    /**
     * Ejecuta la consulta y muestra los resultados.
     * Reemplaza a controlador/consultarpersonas/consultarpersonas.php
     * y vista/consultarpersona/resultadoConsulta.php
     */
    public function buscar(Request $request)
    {
        $request->validate([
            'NumDocumento' => 'required',
        ]);

        $resultados = Usuario::query()
            ->join('nucleofamiliar', 'usuario.idUsuario', '=', 'nucleofamiliar.idUsuario')
            ->join('encuesta', 'nucleofamiliar.idEncuesta', '=', 'encuesta.idEncuesta')
            ->where('usuario.NumDocumento', $request->NumDocumento)
            ->select(
                'usuario.idUsuario',
                'usuario.NumDocumento',
                'nucleofamiliar.idNucleoFamiliar',
                'nucleofamiliar.idEncuesta'
            )
            ->get();

        return view('consultas.resultado', compact('resultados'));
    }
}
