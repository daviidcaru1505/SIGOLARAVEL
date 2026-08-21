<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\NucleoFamiliar;
use App\Models\Usuario;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReporteController extends Controller
{
    /**
     * Menú de reportes.
     * Reemplaza a vista/reportessigo/reportesfinales.php
     */
    public function index()
    {
        return view('reportes.index');
    }

    /**
     * Listado de usuarios (HTML) + botón para descargar CSV.
     * Reemplaza a informes/usuario/replistadousuarios.php
     */
    public function usuarios()
    {
        $usuarios = Usuario::all();

        return view('reportes.usuarios', compact('usuarios'));
    }

    public function usuariosCsv(): StreamedResponse
    {
        $usuarios = Usuario::all();

        return $this->csv('listado_usuarios.csv', ['ID', 'Documento', 'Nombre', 'Apellido', 'Correo'], $usuarios->map(fn ($u) => [
            $u->idUsuario, $u->NumDocumento, $u->Nombre, $u->Apellido, $u->Correo,
        ]));
    }

    /**
     * Listado de encuestas (HTML) + CSV.
     * Reemplaza a informes/encuesta/replistadoencuestas.php
     */
    public function encuestas()
    {
        $encuestas = Encuesta::all();

        return view('reportes.encuestas', compact('encuestas'));
    }

    public function encuestasCsv(): StreamedResponse
    {
        $encuestas = Encuesta::all();

        return $this->csv('listado_encuestas.csv', ['ID', 'Fecha Creación', 'Estado', 'Soporte', 'Nivel Socioeconómico'], $encuestas->map(fn ($e) => [
            $e->idEncuesta, $e->FechaCreacion, $e->Estado, $e->Soporte, $e->NivelSocioeconomico,
        ]));
    }

    /**
     * Listado de núcleos familiares (HTML) + CSV.
     * Reemplaza a informes/nucleos/replistadonucleof.php
     */
    public function nucleos()
    {
        $nucleos = NucleoFamiliar::all();

        return view('reportes.nucleos', compact('nucleos'));
    }

    public function nucleosCsv(): StreamedResponse
    {
        $nucleos = NucleoFamiliar::all();

        return $this->csv('listado_nucleos.csv', ['ID Núcleo', 'ID Usuario', 'ID Encuesta', 'Jefe de Hogar'], $nucleos->map(fn ($n) => [
            $n->idNucleoFamiliar, $n->idUsuario, $n->idEncuesta, $n->JefeHogar,
        ]));
    }

    /**
     * Helper genérico para generar un CSV descargable.
     */
    private function csv(string $filename, array $encabezados, $filas): StreamedResponse
    {
        return response()->streamDownload(function () use ($encabezados, $filas) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $encabezados);
            foreach ($filas as $fila) {
                fputcsv($handle, $fila);
            }
            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv']);
    }
}
