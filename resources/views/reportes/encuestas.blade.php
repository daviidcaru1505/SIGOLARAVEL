@extends('layouts.app')

@section('title', 'Reporte de Encuestas - SIGO')

@section('content')

    <div class="container">
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">LISTADO DE ENCUESTAS</h4>
                <a href="{{ route('reportes.encuestas.csv') }}" class="btn btn-light btn-sm">⬇️ Descargar CSV</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>
                                <th>Soporte</th>
                                <th>Nivel Socioeconómico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encuestas as $encuesta)
                                <tr>
                                    <td>{{ $encuesta->idEncuesta }}</td>
                                    <td>{{ $encuesta->FechaCreacion }}</td>
                                    <td>{{ $encuesta->Estado }}</td>
                                    <td>{{ $encuesta->Soporte }}</td>
                                    <td>{{ $encuesta->NivelSocioeconomico }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

@endsection
