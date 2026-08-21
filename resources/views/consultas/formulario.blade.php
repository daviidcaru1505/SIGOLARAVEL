@extends('layouts.app')

@section('title', 'Consultar Usuarios - SIGO')

@section('content')

{{-- Estilos personalizados con la paleta de colores SIGO --}}
<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
    }

    .card-consultar {
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 24px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
        transition: transform 0.3s ease;
    }

    .header-consultar {
        background: var(--sigo-gradient);
        border-radius: 23px 23px 0 0 !important;
    }

    .icon-box-consultar {
        width: 65px;
        height: 65px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background-color: #e0e7ff;
        color: var(--sigo-primary);
    }

    .btn-consultar {
        background: var(--sigo-gradient);
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-consultar:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
    }

    .form-control:focus {
        border-color: var(--sigo-primary);
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.15);
    }
</style>

{{-- Iconos de Bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            
            <div class="card card-consultar bg-white">
                
                {{-- Encabezado con degradado --}}
                <div class="header-consultar text-white text-center p-4">
                    <h4 class="mb-0 fw-bold tracking-wide">
                        <i class="bi bi-search me-2"></i>CONSULTAR USUARIO
                    </h4>
                    <p class="text-white-50 small mb-0 mt-1">Búsqueda directa en la base de datos SIGO</p>
                </div>

                <div class="card-body p-4 p-sm-5">
                    
                    {{-- Icono representativo central --}}
                    <div class="text-center mb-4">
                        <div class="icon-box-consultar mb-2">
                            <i class="bi bi-person-vcard fs-2"></i>
                        </div>
                        <p class="text-muted small">Ingresa el número de documento de identidad para verificar el estado e información de la persona.</p>
                    </div>

                    {{-- Mensajes de error o validación --}}
                    @if(session('error'))
                        <div class="alert alert-danger border-0 rounded-3 text-center small py-2 mb-4">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('consultas.buscar') }}" method="post">
                        @csrf

                        <div class="form-floating mb-4">
                            <input type="number" class="form-control rounded-3" id="NumDocumento" name="NumDocumento"
                                placeholder="123456789" value="{{ old('NumDocumento') }}" required autofocus>
                            <label for="NumDocumento" class="text-muted">
                                <i class="bi bi-card-heading me-1"></i> Número de Documento
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-consultar py-3 fw-bold rounded-3 text-white">
                                <i class="bi bi-search me-2"></i> Consultar
                            </button>
                            <a href="{{ route('principal') }}" class="btn btn-light py-2 text-muted fw-semibold rounded-3 mt-2">
                                <i class="bi bi-arrow-left me-1"></i> Volver a Principal
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection