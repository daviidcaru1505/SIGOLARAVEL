@extends('layouts.app')

@section('title', 'Reporte de Núcleos Familiares - SIGO')

@section('content')

<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    .card-header-sigo {
        background: var(--sigo-gradient);
        border-bottom: none;
    }

    .table-sigo thead {
        background-color: #f1f5f9;
        color: #475569;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .btn-export-csv {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(4px);
        transition: all 0.2s ease;
    }

    .btn-export-csv:hover {
        background: #ffffff;
        color: var(--sigo-primary);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        {{-- Header con acciones --}}
        <div class="card-header-sigo text-white p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-house-heart-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Listado de Núcleos Familiares</h1>
                    <p class="text-white-50 small mb-0">Consulta y exportación de la composición familiar registrada</p>
                </div>
            </div>

            <div>
                <a href="{{ route('reportes.nucleos.csv') }}" class="btn btn-export-csv rounded-3 fw-semibold px-3 py-2 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-download"></i> Descargar CSV
                </a>
            </div>
        </div>

        <div class="card-body p-4 bg-white">
            
            {{-- Tabla estilizada --}}
            <div class="table-responsive rounded-3 border">
                <table class="table table-hover align-middle mb-0 table-sigo">
                    <thead>
                        <tr>
                            <th class="ps-4">ID Núcleo</th>
                            <th>ID Usuario</th>
                            <th>ID Encuesta</th>
                            <th class="text-end pe-4">Jefe de Hogar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nucleos as $nucleo)
                            <tr>
                                <td class="ps-4 fw-bold text-primary">#{{ $nucleo->idNucleoFamiliar }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <i class="bi bi-person me-1 text-secondary"></i>User #{{ $nucleo->idUsuario }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <i class="bi bi-file-earmark-text me-1 text-secondary"></i>Encuesta #{{ $nucleo->idEncuesta }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    @if($nucleo->JefeHogar)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-semibold">
                                            <i class="bi bi-check-circle-fill me-1"></i>Sí
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1 fw-normal">
                                            No
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No hay registros de núcleos familiares disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Botón Volver --}}
            <div class="mt-4 pt-2">
                <a href="{{ route('reportes.index') }}" class="btn btn-light border text-secondary fw-semibold rounded-3 px-4 py-2">
                    <i class="bi bi-arrow-left me-1"></i> Volver a Reportes
                </a>
            </div>

        </div>
    </div>
</div>

@endsection