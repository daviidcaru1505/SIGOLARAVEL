@extends('layouts.app')

@section('title', 'Reportes - SIGO')

@section('content')

    <div class="container">
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Reportes del Sistema</h4>
            </div>

            <div class="card-body">
                <p class="text-muted">Seleccione el reporte que desea generar.</p>

                <a href="{{ route('reportes.usuarios') }}" class="btn btn-success me-2">📄 Reporte de Usuarios</a>
                <a href="{{ route('reportes.encuestas') }}" class="btn btn-primary me-2">📋 Reporte de Encuestas</a>
                <a href="{{ route('reportes.nucleos') }}" class="btn btn-warning me-2">📝 Reporte de Núcleos Familiares</a>
            </div>
        </div>
    </div>

@endsection
