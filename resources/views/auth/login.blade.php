@extends('layouts.guest')

@section('title', 'Inicio de Sesión - SIGO')

@section('content')

{{-- Estilos personalizados con paleta moderna --}}
<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-secondary: #06b6d4;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .brand-title {
        background: var(--sigo-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background-color: #e0e7ff;
        color: var(--sigo-primary);
    }

    .card-login {
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 24px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
    }

    .btn-login {
        background: var(--sigo-gradient);
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-login:hover {
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

<div class="container login-wrapper py-5">
    <div class="row align-items-center g-5 w-100 mx-0">

        {{-- Lado Izquierdo: Presentación --}}
        <div class="col-lg-6 text-start">
            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-2 rounded-pill mb-3">
                Plataforma de Gestión
            </span>
            <h1 class="display-4 fw-black fw-bold brand-title mb-3">Bienvenido a SIGO</h1>
            <p class="lead text-secondary mb-4">
                Sistema Integral de Gestión de Encuestas para la administración, tabulación y consulta de información socioeconómica.
            </p>

            <div class="card border-0 rounded-4 p-4 hover-card" style="background-color: #f8fafc;">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box me-3">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color: #0f172a;">Plataforma Centralizada</h5>
                </div>
                <p class="text-muted mb-0 small lh-base">
                    Un entorno tecnológico diseñado para organizar y analizar datos de caracterización poblacional de forma ágil, segura y estructurada.
                </p>
            </div>
        </div>

        {{-- Lado Derecho: Tarjeta de Login --}}
        <div class="col-lg-6">
            <div class="card card-login bg-white p-4 p-sm-5">
                
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle p-3 mb-3" style="background-color: #e0e7ff; width: 90px; height: 90px;">
                        <i class="bi bi-person-circle display-4" style="color: var(--sigo-primary);"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">Inicio de Sesión</h3>
                    <p class="text-muted small">Ingresa tus credenciales para acceder al sistema</p>
                </div>

                {{-- Alertas de Validación o Errores --}}
                @if(session('error'))
                    <div class="alert alert-danger border-0 rounded-3 text-center small py-2 mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput" name="correo"
                            placeholder="name@example.com" value="{{ old('correo') }}" required>
                        <label for="floatingInput" class="text-muted"><i class="bi bi-envelope me-1"></i> Correo Electrónico</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control rounded-3" id="floatingPassword" name="contrasena"
                            placeholder="Password" required>
                        <label for="floatingPassword" class="text-muted"><i class="bi bi-lock me-1"></i> Contraseña</label>
                    </div>

                    <button class="btn btn-primary btn-login w-100 py-3 fw-bold rounded-3 text-white mb-3" type="submit">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Ingresar
                    </button>

                    <div class="text-center">
                        <a href="{{ route('usuarios.create') }}" class="text-decoration-none small fw-semibold" style="color: var(--sigo-primary);">
                            ¿No estás registrado? Crea una cuenta aquí
                        </a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection