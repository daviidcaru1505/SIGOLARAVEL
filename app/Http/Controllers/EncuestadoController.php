<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Usuario;   // <-- Importar el modelo Usuario
use Illuminate\Http\Request;

class EncuestadoController extends Controller
{
    public function miPuntaje()
{
    // Obtener el ID del usuario desde la sesión
    $idUsuario = session('usuario_id');

    // 1. Obtener la información del usuario
    $usuario = Usuario::find($idUsuario);

    // 2. Obtener la encuesta asociada al usuario
    $encuesta = Encuesta::where('idUsuario', $idUsuario)->first();

    return view('encuestado.mi_puntaje', compact('usuario', 'encuesta'));
}
}