@extends('layouts.app')

@section('title', 'Resultado Consulta - SIGO')

@section('content')

<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
    }

    .card-resultados {
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 24px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
        overflow: hidden;
    }

    .header-resultados {
        background: var(--sigo-gradient);
    }

    .table-custom thead {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.05em;
    }

    .table-custom tbody tr {
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: #f1f5f9 !important;
    }

    .badge-data {
        background-color: #e0e7ff;
        color: var(--sigo-primary);
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 12px;
    }

    .btn-action-main {
        background: var(--sigo-gradient);
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-action-main:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card card-resultados bg-white">
                
                <div class="header-resultados text-white text-center p-4">
                    <h4 class="mb-0 fw-bold tracking-wide">
                        <i class="bi bi-file-earmark-text me-2"></i>RESULTADOS DE LA CONSULTA
                    </h4>
                    <p class="text-white-50 small mb-0 mt-1">Registros asociados al parámetro de búsqueda ingresado</p>
                </div>

                <div class="card-body p-4 p-md-5">

                    @if ($resultados->isNotEmpty())
                        <div class="table-responsive rounded-4 border border-light-subtle shadow-sm">
                            <table class="table table-custom align-middle text-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3">ID Usuario</th>
                                        <th class="py-3">Documento</th>
                                        <th class="py-3">ID Núcleo Familiar</th>
                                        <th class="py-3">ID Encuesta</th>
                                        <th class="py-3">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resultados as $fila)
                                        <tr>
                                            <td class="py-3 fw-bold text-secondary">
                                                #{{ $fila->idUsuario }}
                                            </td>
                                            <td class="py-3">
                                                <span class="badge-data">
                                                    <i class="bi bi-card-heading me-1"></i>{{ $fila->NumDocumento }}
                                                </span>
                                            </td>
                                            <td class="py-3 text-muted">
                                                @if($fila->idNucleoFamiliar)
                                                    <i class="bi bi-people me-1"></i>#{{ $fila->idNucleoFamiliar }}
                                                @else
                                                    <span class="badge bg-light text-muted border">Sin núcleo</span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-muted">
                                                @if($fila->idEncuesta)
                                                    <i class="bi bi-clipboard-data me-1"></i>#{{ $fila->idEncuesta }}
                                                @else
                                                    <span class="badge bg-light text-muted border">Sin encuesta</span>
                                                @endif
                                            </td>
                                            <td class="py-3">
                                                @if(!$fila->idEncuesta)
                                                    <a href="{{ route('encuestas.create', ['idUsuario' => $fila->idUsuario]) }}" class="btn btn-sm btn-outline-primary rounded-3 fw-semibold">
                                                        <i class="bi bi-plus-circle me-1"></i>Crear Encuesta
                                                    </a>
                                                @else
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-3">
                                                        <i class="bi bi-check-circle-fill me-1"></i>Registrada
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 p-3" style="background-color: #fee2e2; color: #dc2626; width: 80px; height: 80px;">
                                <i class="bi bi-search-heart fs-1"></i>
                            </div>
                            <h5 class="fw-bold text-dark">No se encontraron registros</h5>
                            <p class="text-muted small mb-0">Verifica el número de documento ingresado e intenta nuevamente.</p>
                        </div>
                    @endif

                    <div class="d-flex justify-content-center gap-3 mt-4 pt-2">
                        <a href="{{ route('consultas.create') }}" class="btn btn-primary btn-action-main px-4 py-2.5 fw-bold rounded-3 text-white">
                            <i class="bi bi-arrow-left me-2"></i> Nueva Consulta
                        </a>
                        <a href="{{ route('principal') }}" class="btn btn-light px-4 py-2.5 fw-semibold text-muted rounded-3 border">
                            <i class="bi bi-house-door me-1"></i> Inicio
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection