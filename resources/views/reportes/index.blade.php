@extends('layouts.app')

@section('title', 'Reportes - SIGO')

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

    .report-card {
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #e2e8f0;
    }

    .report-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 20px -5px rgba(0, 0, 0, 0.08) !important;
        border-color: var(--sigo-primary);
    }

    .icon-wrapper {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
    }
</style>

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        
        {{-- Header principal --}}
        <div class="card-header-sigo text-white p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-file-earmark-bar-graph-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Reportes del Sistema</h1>
                    <p class="text-white-50 small mb-0">Seleccione el tipo de informe que desea consultar o exportar</p>
                </div>
            </div>
        </div>

        <div class="card-body p-4 bg-white">
            
            {{-- Grid de opciones de reporte --}}
            <div class="row g-4">
                
                {{-- Reporte de Usuarios --}}
                <div class="col-md-4">
                    <div class="card h-100 rounded-4 p-3 report-card">
                        <div class="card-body d-flex flex-column">
                            <div class="icon-wrapper bg-success-subtle text-success mb-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Reporte de Usuarios</h5>
                            <p class="text-muted small flex-grow-1">Consulta el listado general de usuarios registrados y sus roles en el sistema.</p>
                            <a href="{{ route('reportes.usuarios') }}" class="btn btn-outline-success fw-semibold rounded-3 w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                <i class="bi bi-file-text"></i> Generar Reporte
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Reporte de Encuestas --}}
                <div class="col-md-4">
                    <div class="card h-100 rounded-4 p-3 report-card">
                        <div class="card-body d-flex flex-column">
                            <div class="icon-wrapper bg-primary-subtle text-primary mb-3">
                                <i class="bi bi-clipboard2-data-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Reporte de Encuestas</h5>
                            <p class="text-muted small flex-grow-1">Visualiza y exporta a CSV los datos recolectados de las encuestas registradas.</p>
                            <a href="{{ route('reportes.encuestas') }}" class="btn btn-outline-primary fw-semibold rounded-3 w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                <i class="bi bi-file-text"></i> Generar Reporte
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Reporte de Núcleos Familiares --}}
                <div class="col-md-4">
                    <div class="card h-100 rounded-4 p-3 report-card">
                        <div class="card-body d-flex flex-column">
                            <div class="icon-wrapper bg-warning-subtle text-warning-emphasis mb-3">
                                <i class="bi bi-house-heart-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Núcleos Familiares</h5>
                            <p class="text-muted small flex-grow-1">Accede a la información consolidada sobre la composición socioeconómica familiar.</p>
                            <a href="{{ route('reportes.nucleos') }}" class="btn btn-outline-warning text-dark fw-semibold rounded-3 w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                <i class="bi bi-file-text"></i> Generar Reporte
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection