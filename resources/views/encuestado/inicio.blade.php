@extends('layouts.encuestado')

@section('title', 'Inicio - SIGO')

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

    .card-hover-sigo {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card-hover-sigo:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .btn-sigo-action {
        background: #f8fafc;
        color: var(--sigo-primary);
        border: 1px solid #e2e8f0;
        transition: all 0.2s ease;
    }

    .btn-sigo-action:hover {
        background: var(--sigo-primary);
        color: #ffffff;
        border-color: var(--sigo-primary);
    }
</style>

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        
        {{-- Banner Principal --}}
        <div class="card-header-sigo text-white p-4 p-md-5 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white rounded-circle flex-shrink-0 shadow-sm" style="width: 56px; height: 56px;">
                    <i class="bi bi-person-circle fs-2 text-primary"></i>
                </div>
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <h1 class="fs-3 fw-bold mb-0">Bienvenido, {{ session('usuario_nombre', 'David') }}</h1>
                        <span class="badge bg-white text-primary rounded-pill px-3 py-1 small fw-semibold d-inline-flex align-items-center gap-1 shadow-sm">
                            <i class="bi bi-patch-check-fill text-primary"></i> Encuestado
                        </span>
                    </div>
                    <p class="text-white-50 mb-0 small">Sistema Integral de Gestión de Encuestas (SIGO)</p>
                </div>
            </div>
        </div>

        {{-- Contenido con Accesos Directos --}}
        <div class="card-body p-4 bg-white">
            <div class="row g-4">

                {{-- Módulo Mi Consulta --}}
                <div class="col-md-6">
                    <div class="card border border-light-subtle shadow-sm rounded-4 h-100 card-hover-sigo">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-3 text-white" style="width: 44px; height: 44px; background: var(--sigo-gradient);">
                                        <i class="bi bi-search fs-5"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-0">Mi Consulta</h5>
                                        <small class="text-muted">Estado y nivel socioeconómico</small>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-4">
                                    Consulta la información registrada de tu encuesta socioeconómica, revisa tus datos personales y verifica tu clasificación actual.
                                </p>
                            </div>
                            <a href="{{ route('encuestado.mi_puntaje') }}" class="btn btn-sigo-action rounded-3 fw-semibold w-100 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                <span>Ver Mi Consulta</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Módulo PQRS --}}
                <div class="col-md-6">
                    <div class="card border border-light-subtle shadow-sm rounded-4 h-100 card-hover-sigo">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-3 bg-warning text-dark" style="width: 44px; height: 44px;">
                                        <i class="bi bi-envelope-paper-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-0">Atención a PQRS</h5>
                                        <small class="text-muted">Peticiones, Quejas y Reclamos</small>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-4">
                                    ¿Necesitas actualizar tus datos o realizar alguna solicitud sobre tu encuesta? Radica tus inquietudes directamente aquí.
                                </p>
                            </div>
                            <a href="{{ url('/pqrs') }}" class="btn btn-sigo-action rounded-3 fw-semibold w-100 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                <span>Ir a PQRS</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection