@extends('layouts.app')

@section('title', 'SIGO - Principal')

@section('content')

{{-- Estilos de diseño premium con paleta personalizada --}}
<style>
    :root {
        --sigo-primary: #4f46e5;       /* Índigo moderno */
        --sigo-secondary: #06b6d4;     /* Cian / Turquesa */
        --sigo-dark: #0f172a;          /* Azul de fondo profundo */
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
        --sigo-glass: rgba(255, 255, 255, 0.85);
    }

    .hero-header {
        background: var(--sigo-gradient);
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.3);
    }

    .hover-card {
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
    }

    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important;
    }

    .icon-wrapper {
        width: 58px;
        height: 58px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
    }

    /* Colores personalizados para las tarjetas de los Grupos Sisbén */
    .card-grupo-a { border-top: 5px solid #ef4444 !important; }
    .card-grupo-b { border-top: 5px solid #f59e0b !important; }
    .card-grupo-c { border-top: 5px solid #06b6d4 !important; }
    .card-grupo-d { border-top: 5px solid #10b981 !important; }

    .badge-grupo-a { background-color: #fee2e2; color: #991b1b; }
    .badge-grupo-b { background-color: #fef3c7; color: #92400e; }
    .badge-grupo-c { background-color: #cffaff; color: #155e75; }
    .badge-grupo-d { background-color: #d1fae5; color: #065f46; }

    .btn-action-primary {
        background-color: #ffffff;
        color: var(--sigo-primary);
        transition: all 0.25s ease;
    }

    .btn-action-primary:hover {
        background-color: #f8fafc;
        color: #3730a3;
        transform: scale(1.03);
    }
</style>

{{-- Iconos de Bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-4">

    {{-- Hero Section Principal --}}
    <div class="p-5 mb-5 text-white rounded-5 hero-header position-relative overflow-hidden">
        <div class="row align-items-center position-relative z-1">
            <div class="col-lg-8 text-start">
                <span class="badge bg-white bg-opacity-20 text-white fw-bold px-3 py-2 rounded-pill mb-3 backdrop-blur">
                    <i class="bi bi-shield-check me-1"></i> Plataforma Oficial SIGO
                </span>
                <h1 class="display-3 fw-black mb-2 text-white fw-bold">SIGO</h1>
                <p class="fs-4 fw-light text-white-50">Sistema de Identificación de Grupos Socioeconómicos</p>
                <p class="lead mt-3 mb-4 text-white-50">
                    Centraliza la recolección de datos, administra encuestas activas y gestiona la clasificación socioeconómica territorial bajo estándares actualizados.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('encuestas.create') }}" class="btn btn-action-primary btn-lg fw-bold px-4 shadow-sm border-0 rounded-3">
                        <i class="bi bi-file-earmark-plus-fill me-2"></i> Nueva Encuesta
                    </a>
                    <a href="{{ route('consultas.create') }}" class="btn btn-outline-light btn-lg px-4 fw-semibold border-2 rounded-3">
                        <i class="bi bi-search me-2"></i> Consultar Datos
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <i class="bi bi-diagram-3-fill display-1 text-white opacity-25"></i>
            </div>
        </div>
    </div>

    {{-- Sección Explicativa: ¿Qué es el Sisbén? --}}
    <div class="row align-items-stretch mb-5 g-4">
        <div class="col-lg-7">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-wrapper me-3" style="background-color: #e0e7ff; color: #4f46e5;">
                        <i class="bi bi-info-circle-fill fs-3"></i>
                    </div>
                    <h2 class="h3 mb-0 fw-bold" style="color: #1e293b;">¿Qué es el Sisbén?</h2>
                </div>
                <p class="text-muted fs-5 lh-base">
                    El Sistema de Identificación de Potenciales Beneficiarios de Programas Sociales es una herramienta del Gobierno Nacional diseñada para clasificar a la población de forma técnica y transparente según sus condiciones socioeconómicas.
                </p>
                <div class="alert border-0 rounded-4 mt-auto mb-0 p-3" style="background-color: #f0fdf4; color: #166534;">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i> <strong>Propósito clave:</strong> Focalizar el acceso a subsidios e inversión social priorizando los hogares vulnerables.
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-card" style="background-color: #f8fafc;">
                <h4 class="fw-bold mb-4" style="color: #0f172a;">
                    <i class="bi bi-sliders me-2" style="color: #4f46e5;"></i>Módulos de Gestión
                </h4>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                    <li class="d-flex align-items-center bg-white p-3 rounded-4 shadow-sm">
                        <i class="bi bi-people-fill fs-4 me-3" style="color: #4f46e5;"></i>
                        <span class="fw-semibold text-secondary">Registro directo de personas e integrantes.</span>
                    </li>
                    <li class="d-flex align-items-center bg-white p-3 rounded-4 shadow-sm">
                        <i class="bi bi-clipboard2-check-fill fs-4 me-3" style="color: #10b981;"></i>
                        <span class="fw-semibold text-secondary">Tabulación automatizada de encuestas.</span>
                    </li>
                    <li class="d-flex align-items-center bg-white p-3 rounded-4 shadow-sm">
                        <i class="bi bi-pie-chart-fill fs-4 me-3" style="color: #f59e0b;"></i>
                        <span class="fw-semibold text-secondary">Generación de reportes y cruces de información.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Paso a Paso interactivo --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">¿Cómo funciona el proceso?</h3>
            <p class="text-muted">Flujo continuo desde la captura de datos hasta la asignación del grupo</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-card text-center p-3 bg-white">
                    <div class="card-body">
                        <div class="icon-wrapper mb-3 mx-auto" style="background-color: #e0e7ff; color: #4f46e5;">
                            <i class="bi bi-pencil-square fs-3"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">1. Encuesta</h5>
                        <p class="text-muted small mb-0">Captura de datos directamente con los miembros del hogar mediante el formulario digital.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-card text-center p-3 bg-white">
                    <div class="card-body">
                        <div class="icon-wrapper mb-3 mx-auto" style="background-color: #d1fae5; color: #059669;">
                            <i class="bi bi-house-heart-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">2. Información</h5>
                        <p class="text-muted small mb-0">Evaluación del estado habitacional, acceso a servicios básicos, salud y nivel educativo.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-card text-center p-3 bg-white">
                    <div class="card-body">
                        <div class="icon-wrapper mb-3 mx-auto" style="background-color: #fef3c7; color: #d97706;">
                            <i class="bi bi-cpu-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">3. Clasificación</h5>
                        <p class="text-muted small mb-0">Procesamiento de variables socioeconómicas por el algoritmo de tabulación.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-card text-center p-3 bg-white">
                    <div class="card-body">
                        <div class="icon-wrapper mb-3 mx-auto" style="background-color: #cffaff; color: #0891b2;">
                            <i class="bi bi-award-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">4. Beneficios</h5>
                        <p class="text-muted small mb-0">Atención e inclusión eficiente dentro de las categorías de inversión pública.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Clasificación en Cards Interactivas --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">Clasificación por Grupos</h3>
            <p class="text-muted">Estructura actual de categorización de población</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-a h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-a fs-6 px-3 py-2 rounded-pill fw-bold">Grupo A</span>
                            <i class="bi bi-exclamation-octagon-fill text-danger fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Pobreza Extrema</h5>
                        <p class="text-muted small mb-0">Población con menor capacidad de generación de ingresos y condiciones vulnerables.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-b h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-b fs-6 px-3 py-2 rounded-pill fw-bold">Grupo B</span>
                            <i class="bi bi-shield-exclamation text-warning fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Pobreza Moderada</h5>
                        <p class="text-muted small mb-0">Hogares con mayor capacidad de ingresos respecto a A, pero aún con vulnerabilidad.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-c h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-c fs-6 px-3 py-2 rounded-pill fw-bold">Grupo C</span>
                            <i class="bi bi-person-badge-fill text-info fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">Vulnerables</h5>
                        <p class="text-muted small mb-0">Población en riesgo continuo de caer en situación de pobreza ante crisis.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 hover-card card-grupo-d h-100 p-2 bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-grupo-d fs-6 px-3 py-2 rounded-pill fw-bold">Grupo D</span>
                            <i class="bi bi-shield-check text-success fs-4"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #1e293b;">No Pobre / No Vulnerable</h5>
                        <p class="text-muted small mb-0">Población autosuficiente económicamente que no requiere asistencia prioritaria.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection