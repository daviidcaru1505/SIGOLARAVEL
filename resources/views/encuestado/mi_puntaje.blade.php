@extends('layouts.encuestado')

@section('title', 'Mi Consulta - SIGO')

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

    .info-card-sigo {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: all 0.2s ease;
    }

    .info-card-sigo:hover {
        border-color: #cbd5e1;
    }

    .text-sigo-primary {
        color: var(--sigo-primary) !important;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Encabezado de la Sección --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-1">Mi Consulta SIGO</h3>
                    <p class="text-muted mb-0 small">
                        Información registrada y clasificación socioeconómica
                    </p>
                </div>
                <a href="{{ route('principal') }}" class="btn btn-outline-secondary btn-sm rounded-3 d-inline-flex align-items-center gap-1 px-3">
                    <i class="bi bi-arrow-left"></i> Volver al Inicio
                </a>
            </div>

            {{-- Tarjeta Principal de Información --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                
                {{-- Banner de la Tarjeta --}}
                <div class="card-header-sigo text-white p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle flex-shrink-0 shadow-sm" style="width: 48px; height: 48px;">
                            <i class="bi bi-person-vcard-fill fs-4 text-sigo-primary"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <h5 class="card-title mb-0 fs-5 fw-bold">
                                    {{ $usuario->Nombre ?? session('usuario_nombre', 'Usuario') }} {{ $usuario->Apellido ?? '' }}
                                </h5>
                                <span class="badge bg-white text-primary rounded-pill px-3 py-1 small fw-semibold d-inline-flex align-items-center gap-1 shadow-sm">
                                    <i class="bi bi-patch-check-fill text-primary"></i> Encuestado
                                </span>
                            </div>
                            <span class="text-white-50 small">Consulta de Información General y Clasificación</span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 bg-white">
                    
                    {{-- Sección 1: Datos Personales --}}
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2 border-bottom pb-2">
                        <i class="bi bi-person-lines-fill text-sigo-primary fs-5"></i>
                        <span>Datos Personales</span>
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 info-card-sigo">
                                <small class="text-muted d-block fw-semibold mb-1">Nombre Completo</small>
                                <strong class="text-dark">
                                    {{ $usuario->Nombre ?? session('usuario_nombre', 'N/A') }} {{ $usuario->Apellido ?? '' }}
                                </strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 info-card-sigo">
                                <small class="text-muted d-block fw-semibold mb-1">Documento de Identidad</small>
                                <strong class="text-dark">{{ $usuario->NumDocumento ?? 'No registrado' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 info-card-sigo">
                                <small class="text-muted d-block fw-semibold mb-1">Correo Electrónico</small>
                                <strong class="text-dark">{{ $usuario->Correo ?? 'No registrado' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 info-card-sigo">
                                <small class="text-muted d-block fw-semibold mb-1">Teléfono / Contacto</small>
                                <strong class="text-dark">{{ $usuario->Telefono ?? 'No registrado' }}</strong>
                            </div>
                        </div>
                    </div>

                    {{-- Sección 2: Resultado de la Encuesta --}}
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2 border-bottom pb-2">
                        <i class="bi bi-file-earmark-bar-graph text-sigo-primary fs-5"></i>
                        <span>Resultado de la Encuesta Socioeconómica</span>
                    </h6>
                    
                    @if(isset($encuesta) && $encuesta)
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 text-center mb-3 mb-md-0 border-end py-2">
                                <span class="text-uppercase text-muted fw-bold d-block small mb-1">Nivel Socioeconómico</span>
                                <span class="display-1 fw-bolder text-sigo-primary d-block">
                                    {{ $encuesta->NivelSocioeconomico ?? 'N/A' }}
                                </span>
                                <div class="mt-2">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                        <i class="bi bi-check-circle-fill me-1"></i> Estado: {{ $encuesta->Estado ?? 'Registrada' }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-7 ps-md-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent py-2">
                                        <span class="text-muted">ID Encuesta:</span>
                                        <span class="fw-bold text-dark">#{{ $encuesta->idEncuesta ?? $encuesta->id }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent py-2">
                                        <span class="text-muted">Fecha de Creación:</span>
                                        <span class="fw-bold text-dark">{{ $encuesta->FechaCreacion ?? $encuesta->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent py-2">
                                        <span class="text-muted">Soporte Adjunto:</span>
                                        <span class="fw-bold text-dark">{{ $encuesta->Soporte ?? 'Sin soporte' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="alert alert-primary bg-primary-subtle text-primary-emphasis border-0 rounded-3 mb-0 d-flex align-items-center gap-3 p-3">
                            <i class="bi bi-info-circle-fill fs-4 flex-shrink-0"></i>
                            <div class="small">
                                Su información y clasificación socioeconómica se encuentran registradas correctamente en el sistema SIGO.
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5 rounded-3 info-card-sigo">
                            <i class="bi bi-exclamation-circle text-warning display-4 d-block mb-2"></i>
                            <h5 class="fw-bold text-dark mb-1">No cuentas con una encuesta vigente</h5>
                            <p class="text-muted small mb-0">
                                Actualmente tu usuario no tiene un registro de encuesta activo en la plataforma SIGO.
                            </p>
                        </div>
                    @endif

                </div>

            </div>

        </div>
    </div>
</div>

@endsection