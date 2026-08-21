@extends('layouts.app')

@section('title', 'Gestionar Novedades - SIGO')

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
        transition: all 0.25s ease;
    }

    .btn-sigo-submit:hover {
        opacity: 0.95;
        transform: translateY(-2px);
        color: #ffffff;
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                
                {{-- Encabezado con gradiente del sistema --}}
                <div class="card-header-sigo text-white text-center py-4 px-3">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle mb-2" style="width: 50px; height: 50px;">
                        <i class="bi bi-bell-fill fs-4 text-white"></i>
                    </div>
                    <h1 class="fs-4 fw-bold mb-0">Gestionar Novedades</h1>
                    <p class="text-white-50 small mb-0 mt-1">Registra modificaciones o actualizaciones de las encuestas</p>
                </div>

                <div class="card-body p-4 bg-white">
                    <form action="{{ route('novedades.store') }}" method="POST">
                        @csrf

                        {{-- Encuesta Relacionada --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary">
                                <i class="bi bi-file-earmark-text me-1 text-primary"></i> Encuesta Relacionada
                            </label>
                            <select class="form-select rounded-3 py-2" name="idEncuesta" required>
                                <option value="" selected disabled>-- Seleccione la encuesta --</option>
                                @foreach ($encuestas as $encuesta)
                                    <option value="{{ $encuesta->idEncuesta }}">
                                        Encuesta #{{ $encuesta->idEncuesta }} — {{ $encuesta->FechaCreacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tipo de Novedad --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary">
                                <i class="bi bi-tag-fill me-1 text-primary"></i> Tipo de Novedad
                            </label>
                            <select class="form-select rounded-3 py-2" name="TipoNovedad" required>
                                <option value="" selected disabled>-- Seleccione la novedad --</option>
                                <option value="Cambio de dirección">Cambio de dirección</option>
                                <option value="Cambio de ingresos">Cambio de ingresos</option>
                                <option value="Fallecimiento">Fallecimiento</option>
                                <option value="Nacimiento">Nacimiento</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary">
                                <i class="bi bi-chat-left-text-fill me-1 text-primary"></i> Descripción
                            </label>
                            <input type="text" class="form-control rounded-3 py-2" name="Descripcion" maxlength="45" placeholder="Ingrese un detalle breve (máx 45 carácteres)" required>
                        </div>

                        {{-- Fecha y Hora --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary">
                                <i class="bi bi-calendar-event-fill me-1 text-primary"></i> Fecha y Hora
                            </label>
                            <input type="datetime-local" class="form-control rounded-3 py-2" name="Fecha" required>
                        </div>

                        {{-- Estado --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary">
                                <i class="bi bi-arrow-repeat me-1 text-primary"></i> Estado del Registro
                            </label>
                            <select class="form-select rounded-3 py-2" name="Estado" required>
                                <option value="" selected disabled>-- Seleccione estado --</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Resuelta">Resuelta</option>
                            </select>
                        </div>

                        {{-- Botón de envío --}}
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-sigo-submit btn-lg fw-bold rounded-3 py-2">
                                <i class="bi bi-send-fill me-2"></i> Registrar Novedad
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection