@extends('layouts.app')

@section('title', 'Crear Encuesta - SIGO')

@section('content')

{{-- Estilos de diseño SIGO --}}
<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
    }

    .card-encuesta {
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 24px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
        overflow: hidden;
    }

    .header-encuesta {
        background: var(--sigo-gradient);
    }

    .btn-submit-encuesta {
        background: var(--sigo-gradient);
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-submit-encuesta:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--sigo-primary);
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.15);
    }
</style>

{{-- Iconos de Bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card card-encuesta bg-white">
                
                {{-- Encabezado con degradado --}}
                <div class="header-encuesta text-white text-center p-4">
                    <h4 class="mb-0 fw-bold tracking-wide">
                        <i class="bi bi-file-earmark-plus-fill me-2"></i>NUEVA ENCUESTA
                    </h4>
                    <p class="text-white-50 small mb-0 mt-1">Registro de datos para clasificación socioeconómica</p>
                </div>

                <div class="card-body p-4 p-sm-5">

                    {{-- Alertas de Error global --}}
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-3 small mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('encuestas.store') }}" method="post">
                        @csrf

                        {{-- Persona Encuestada (Campo Obligatorio de BD) --}}
                        <div class="form-floating mb-3">
                            <select class="form-select rounded-3" id="idUsuario" name="idUsuario" required>
                                <option value="" disabled {{ old('idUsuario') ? '' : 'selected' }}>Seleccione una persona...</option>
                                @if(isset($usuarios))
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->idUsuario }}" {{ old('idUsuario') == $usuario->idUsuario ? 'selected' : '' }}>
                                            {{ $usuario->NumDocumento }} - {{ $usuario->Nombre }} {{ $usuario->Apellido }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <label for="idUsuario" class="text-muted">
                                <i class="bi bi-person-fill me-1"></i> Persona Encuestada
                            </label>
                        </div>

                        {{-- Fecha y Hora --}}
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control rounded-3" id="FechaCreacion" name="FechaCreacion" 
                                value="{{ old('FechaCreacion', date('Y-m-d\TH:i')) }}" required>
                            <label for="FechaCreacion" class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i> Fecha y Hora
                            </label>
                        </div>

                        {{-- Estado del Usuario --}}
                        <div class="form-floating mb-3">
                            <select class="form-select rounded-3" id="Estado" name="Estado" required>
                                <option value="" disabled {{ old('Estado') ? '' : 'selected' }}>Seleccione una opción...</option>
                                <option value="Activo" {{ old('Estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ old('Estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            <label for="Estado" class="text-muted">
                                <i class="bi bi-toggle-on me-1"></i> Estado del Usuario
                            </label>
                        </div>

                        {{-- Soporte --}}
                        <div class="form-floating mb-3">
                            <select class="form-select rounded-3" id="Soporte" name="Soporte" required>
                                <option value="" disabled {{ old('Soporte') ? '' : 'selected' }}>Seleccione una opción...</option>
                                <option value="Documento" {{ old('Soporte') == 'Documento' ? 'selected' : '' }}>Documento</option>
                                <option value="Certificado" {{ old('Soporte') == 'Certificado' ? 'selected' : '' }}>Certificado</option>
                                <option value="Ninguno" {{ old('Soporte') == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            </select>
                            <label for="Soporte" class="text-muted">
                                <i class="bi bi-paperclip me-1"></i> Tipo de Soporte
                            </label>
                        </div>

                        {{-- Nivel Socioeconómico --}}
                        <div class="form-floating mb-4">
                            <select class="form-select rounded-3" id="NivelSocioeconomico" name="NivelSocioeconomico" required>
                                <option value="" disabled {{ old('NivelSocioeconomico') ? '' : 'selected' }}>Seleccione el grupo correspondiente...</option>
                                <option value="A" {{ old('NivelSocioeconomico') == 'A' ? 'selected' : '' }}>Grupo A - Pobreza Extrema</option>
                                <option value="B" {{ old('NivelSocioeconomico') == 'B' ? 'selected' : '' }}>Grupo B - Pobreza Moderada</option>
                                <option value="C" {{ old('NivelSocioeconomico') == 'C' ? 'selected' : '' }}>Grupo C - Vulnerable</option>
                                <option value="D" {{ old('NivelSocioeconomico') == 'D' ? 'selected' : '' }}>Grupo D - No Pobre</option>
                            </select>
                            <label for="NivelSocioeconomico" class="text-muted">
                                <i class="bi bi-diagram-3 me-1"></i> Nivel Socioeconómico
                            </label>
                        </div>

                        {{-- Botones de Acción --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-submit-encuesta py-3 fw-bold rounded-3 text-white">
                                <i class="bi bi-check-circle-fill me-2"></i> Guardar Encuesta
                            </button>
                            <a href="{{ route('principal') }}" class="btn btn-light py-2 text-muted fw-semibold rounded-3 mt-2">
                                <i class="bi bi-arrow-left me-1"></i> Cancelar y Volver
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection