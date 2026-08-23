@extends('layouts.encuestado')

@section('title', 'PQRS - SIGO')

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

    .form-control:focus, .form-select:focus {
        border-color: var(--sigo-primary);
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.15);
    }

    .btn-sigo-submit {
        background: var(--sigo-gradient);
        color: #ffffff;
        border: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
    }

    .btn-sigo-submit:hover {
        color: #ffffff;
        opacity: 0.95;
        transform: translateY(-1px);
    }

    .text-sigo-primary {
        color: var(--sigo-primary) !important;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Encabezado de la Sección --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-1">Módulo PQRS</h3>
                    <p class="text-muted mb-0 small">Peticiones, Quejas, Reclamos y Sugerencias</p>
                </div>
                <a href="{{ route('principal') }}" class="btn btn-outline-secondary btn-sm rounded-3 d-inline-flex align-items-center gap-1 px-3">
                    <i class="bi bi-arrow-left"></i> Volver al Inicio
                </a>
            </div>

            {{-- Tarjeta Principal del Formulario --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                
                {{-- Banner de Encabezado --}}
                <div class="card-header-sigo text-white p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle flex-shrink-0 shadow-sm" style="width: 48px; height: 48px;">
                            <i class="bi bi-envelope-paper-heart-fill fs-4 text-sigo-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0 fs-5 fw-bold">Radicar nueva solicitud</h5>
                            <span class="text-white-50 small">Ingresa los detalles de tu requerimiento a continuación</span>
                        </div>
                    </div>
                </div>

                {{-- Cuerpo del Formulario --}}
                <div class="card-body p-4 bg-white">
                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Tipo de Solicitud</label>
                            <select name="tipo" class="form-select rounded-3 py-2" required>
                                <option value="" selected disabled>-- Selecciona un tipo --</option>
                                <option value="peticion">Petición</option>
                                <option value="queja">Queja</option>
                                <option value="reclamo">Reclamo</option>
                                <option value="sugerencia">Sugerencia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Asunto</label>
                            <input type="text" name="asunto" class="form-control rounded-3 py-2" placeholder="Resumen breve del motivo..." required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Mensaje o Detalle</label>
                            <textarea name="mensaje" rows="5" class="form-control rounded-3 p-3" placeholder="Describe detalladamente tu solicitud para poder brindarte una respuesta oportuna..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-sigo-submit rounded-3 fw-semibold py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-send-fill"></i>
                                <span>Enviar Solicitud</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection