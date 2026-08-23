@extends('layouts.guest')

@section('title', 'SIGO - Sistema de Identificación de Grupos Socioeconómicos')

@section('content')

{{-- Estilos de diseño premium con la paleta personalizada --}}
<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-secondary: #06b6d4;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
    }

    .hero-landing {
        background: var(--sigo-gradient);
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.25);
    }

    .hover-card {
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
    }

    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
    }

    .icon-wrapper-module {
        width: 60px;
        height: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        margin-bottom: 12px;
    }

    /* Estilos para badges de la tabla de clasificación */
    .badge-grupo-a { background-color: #fee2e2; color: #991b1b; }
    .badge-grupo-b { background-color: #fef3c7; color: #92400e; }
    .badge-grupo-c { background-color: #cffaff; color: #155e75; }
    .badge-grupo-d { background-color: #d1fae5; color: #065f46; }

    .btn-access {
        background-color: #ffffff;
        color: var(--sigo-primary);
        transition: all 0.25s ease;
    }

    .btn-access:hover {
        background-color: #f8fafc;
        color: #3730a3;
        transform: scale(1.03);
    }
</style>

{{-- Iconos de Bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- PORTADA HERO --}}
<div class="hero-landing text-white py-5 mb-5 position-relative overflow-hidden">
    <div class="container py-4 text-center position-relative z-1">
        <span class="badge bg-white bg-opacity-20 text-white fw-bold px-3 py-2 rounded-pill mb-3">
            <i class="bi bi-shield-check me-1"></i> Plataforma de Caracterización
        </span>
        <h1 class="display-3 fw-bold text-white mb-2">Bienvenido a SIGO</h1>
        <p class="fs-4 text-white-50 mx-auto mb-4" style="max-width: 800px;">
            Sistema Integral de Identificación y Gestión de Grupos Socioeconómicos para la caracterización eficiente de la población.
        </p>
        <a href="{{ route('login') }}" class="btn btn-access btn-lg fw-bold px-5 py-3 shadow-sm border-0 rounded-3">
            <i class="bi bi-box-arrow-in-right me-2"></i> Acceder al Sistema
        </a>
    </div>
</div>

<div class="container mb-5">

    {{-- INFORMACIÓN GENERAL & OBJETIVO SIGO --}}
    <div class="row align-items-stretch g-4 mb-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 hover-card h-100 bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-wrapper-module me-3" style="background-color: #e0e7ff; color: #4f46e5;">
                        <i class="bi bi-info-circle-fill fs-3"></i>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #0f172a;">¿Qué es SIGO?</h3>
                </div>
                <p class="text-secondary lh-base">
                    Es una plataforma tecnológica avanzada diseñada para facilitar el registro, caracterización y administración centralizada de la información socioeconómica de los hogares.
                </p>
                <p class="text-secondary lh-base mb-0">
                    Permite consolidar datos de encuestas, usuarios, novedades y consultas mediante un sistema ágil, estructurado e integrado.
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 hover-card h-100 bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-wrapper-module me-3" style="background-color: #d1fae5; color: #059669;">
                        <i class="bi bi-bullseye fs-3"></i>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #0f172a;">Objetivo de SIGO</h3>
                </div>
                <p class="text-secondary lh-base">
                    Optimizar la clasificación de la población registrada para permitir un análisis transparente, rápido y confiable de la información socioeconómica almacenada.
                </p>
                <div class="alert border-0 rounded-3 mt-auto mb-0 p-3" style="background-color: #f0fdf4; color: #166534;">
                    <i class="bi bi-patch-check-fill me-2 fs-5"></i> <strong>Gestión Eficiente:</strong> Garantiza el control preciso de fichas socioeconómicas y solicitudes.
                </div>
            </div>
        </div>
    </div>

    {{-- MÓDULOS / FUNCIONALIDADES --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">Funcionalidades del Sistema</h3>
            <p class="text-muted">Módulos principales para la gestión de información</p>
        </div>

        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-card bg-white h-100">
                    <div class="icon-wrapper-module mx-auto" style="background-color: #e0e7ff; color: #4f46e5;">
                        <i class="bi bi-journal-text fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Encuestas</h5>
                    <p class="text-muted small mb-0">Registro y captura digital de datos socioeconómicos.</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-card bg-white h-100">
                    <div class="icon-wrapper-module mx-auto" style="background-color: #d1fae5; color: #059669;">
                        <i class="bi bi-people-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Usuarios</h5>
                    <p class="text-muted small mb-0">Administración de perfiles y núcleos familiares.</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-card bg-white h-100">
                    <div class="icon-wrapper-module mx-auto" style="background-color: #fef3c7; color: #d97706;">
                        <i class="bi bi-search fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Consultas</h5>
                    <p class="text-muted small mb-0">Búsqueda rápida y verificación de documentos.</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-card bg-white h-100">
                    <div class="icon-wrapper-module mx-auto" style="background-color: #fee2e2; color: #dc2626;">
                        <i class="bi bi-clipboard-pulse fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Novedades</h5>
                    <p class="text-muted small mb-0">Actualización e historial de modificaciones.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CLASIFICACIÓN SIGO (Diseño Grid en Cards) --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">Clasificación SIGO</h3>
            <p class="text-muted">Estructura oficial de grupos de categorización socioeconómica</p>
        </div>

        <div class="row g-4">
            {{-- Grupo A --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-a h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-a fs-6 px-3 py-2 rounded-pill fw-bold">Grupo A</span>
                            <i class="bi bi-exclamation-octagon-fill text-danger fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Pobreza Extrema</h5>
                        <p class="text-muted small mb-0">Población con menor capacidad de generación de ingresos y condiciones de vulnerabilidad alta.</p>
                    </div>
                </div>
            </div>

            {{-- Grupo B --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-b h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-b fs-6 px-3 py-2 rounded-pill fw-bold">Grupo B</span>
                            <i class="bi bi-shield-exclamation text-warning fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Pobreza Moderada</h5>
                        <p class="text-muted small mb-0">Hogares con mayor capacidad de ingresos que el grupo A, pero con condiciones de vulnerabilidad.</p>
                    </div>
                </div>
            </div>

            {{-- Grupo C --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-c h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-c fs-6 px-3 py-2 rounded-pill fw-bold">Grupo C</span>
                            <i class="bi bi-person-badge-fill text-info fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Población Vulnerable</h5>
                        <p class="text-muted small mb-0">Población en riesgo de caer en condición de pobreza ante eventualidades económicas.</p>
                    </div>
                </div>
            </div>

            {{-- Grupo D --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-d h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-d fs-6 px-3 py-2 rounded-pill fw-bold">Grupo D</span>
                            <i class="bi bi-shield-check text-success fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">No Pobre / No Vulnerable</h5>
                        <p class="text-muted small mb-0">Población con estabilidad socioeconómica que no requiere atención prioritaria.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection