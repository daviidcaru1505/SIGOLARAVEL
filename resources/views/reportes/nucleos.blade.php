@extends('layouts.app')

@section('title', 'Reporte de Núcleos Familiares - SIGO')

@section('content')

    <div class="container">
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">LISTADO DE NÚCLEOS FAMILIARES</h4>
                <a href="{{ route('reportes.nucleos.csv') }}" class="btn btn-light btn-sm">⬇️ Descargar CSV</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>ID Núcleo</th>
                                <th>ID Usuario</th>
                                <th>ID Encuesta</th>
                                <th>Jefe de Hogar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nucleos as $nucleo)
                                <tr>
                                    <td>{{ $nucleo->idNucleoFamiliar }}</td>
                                    <td>{{ $nucleo->idUsuario }}</td>
                                    <td>{{ $nucleo->idEncuesta }}</td>
                                    <td>{{ $nucleo->JefeHogar ? 'Sí' : 'No' }}</td>
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
