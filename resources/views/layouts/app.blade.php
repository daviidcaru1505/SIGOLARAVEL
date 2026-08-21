<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIGO')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --sigo-primary: #4f46e5;
            --sigo-dark: #0f172a;
            --sigo-gradient: linear-gradient(180deg, #4f46e5 0%, #3730a3 100%);
            --sidebar-collapsed-width: 70px;
            --sidebar-expanded-width: 250px;
            --transition-speed: 0.3s;
            --transition-curve: cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }

        /* SIDEBAR HOVER DESPLEGABLE */
        #sidebar {
            width: var(--sidebar-collapsed-width);
            background: var(--sigo-gradient);
            color: #fff;
            transition: width var(--transition-speed) var(--transition-curve);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow: hidden;
            white-space: nowrap;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
        }

        /* Se expande al pasar el cursor */
        #sidebar:hover {
            width: var(--sidebar-expanded-width);
        }

        .sidebar-header {
            height: 65px;
            display: flex;
            align-items: center;
            padding: 0 18px;
            background: rgba(0, 0, 0, 0.1);
        }

        .sidebar-text {
            opacity: 0;
            transition: opacity 0.2s ease;
            pointer-events: none;
        }

        #sidebar:hover .sidebar-text {
            opacity: 1;
            pointer-events: auto;
        }

        .nav-link-sidebar {
            color: rgba(255, 255, 255, 0.8);
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-weight: 500;
            border-radius: 12px;
            margin: 0.25rem 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .nav-link-sidebar i {
            font-size: 1.35rem;
            min-width: 30px;
        }

        .nav-link-sidebar:hover, .nav-link-sidebar.active {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.18);
        }

        /* ÁREA DE CONTENIDO (Se desplaza sincronizada con el menú) */
        #content {
            width: 100%;
            padding-left: var(--sidebar-collapsed-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: padding-left var(--transition-speed) var(--transition-curve);
        }

        /* Detecta cuando el menú está en hover y empuja el contenido hacia la derecha */
        .wrapper:has(#sidebar:hover) #content {
            padding-left: var(--sidebar-expanded-width);
        }

        /* BARRA SUPERIOR */
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.8rem 2rem;
            height: 65px;
        }

        .avatar-user {
            width: 38px;
            height: 38px;
            object-fit: cover;
            border: 2px solid var(--sigo-primary);
        }
    </style>
</head>

<body>

    <div class="wrapper">

        {{-- SIDEBAR HOVER --}}
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('principal') }}" class="d-flex align-items-center gap-3 text-white text-decoration-none">
                    <img src="{{ asset('img/logo-sigo.png') }}" alt="Logo SIGO" height="32" class="flex-shrink-0">
                    <span class="fw-bold fs-4 tracking-wide sidebar-text">SIGO</span>
                </a>
            </div>

            <div class="py-3">
                <small class="text-white-50 px-4 text-uppercase fw-bold sidebar-text d-block mb-2" style="font-size: 0.65rem;">Menú</small>
                
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{ route('principal') }}" class="nav-link-sidebar" title="Inicio">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="sidebar-text ms-3">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('encuestas.create') }}" class="nav-link-sidebar" title="Crear Encuesta">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            <span class="sidebar-text ms-3">Crear Encuesta</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('consultas.create') }}" class="nav-link-sidebar" title="Consultar Usuario">
                            <i class="bi bi-search"></i>
                            <span class="sidebar-text ms-3">Consultar Usuario</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios.index') }}" class="nav-link-sidebar" title="Editar Usuario">
                            <i class="bi bi-person-gear"></i>
                            <span class="sidebar-text ms-3">Editar Usuario</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reportes.index') }}" class="nav-link-sidebar" title="Crear Reportes">
                            <i class="bi bi-bar-chart-line-fill"></i>
                            <span class="sidebar-text ms-3">Crear Reportes</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- CONTENIDO PRINCIPAL --}}
        <div id="content">

            {{-- TOPBAR SUPERIOR --}}
            <header class="topbar d-flex justify-content-between align-items-center mb-4 shadow-sm">
                <div class="fw-semibold text-muted small d-none d-md-block">
                    Sistema Integral de Gestión de Encuestas
                </div>

                <div class="ms-auto dropdown">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/usuario.png') }}" alt="Usuario" class="rounded-circle avatar-user me-2">
                        <span class="fw-semibold small">{{ session('usuario_nombre', 'Usuario') }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-2">
                        <li class="px-3 py-2 border-bottom">
                            <span class="d-block text-muted small">Conectado como</span>
                            <span class="fw-bold text-dark">{{ session('usuario_nombre', 'Usuario SIGO') }}</span>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2 py-2">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            {{-- ALERTAS GLOBALES --}}
            <div class="container-fluid px-4">
                @if (session('exito'))
                    <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                        <div>{{ session('exito') }}</div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                            <strong class="fw-bold">Por favor revisa los siguientes errores:</strong>
                        </div>
                        <ul class="mb-0 ps-4 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            {{-- CONTENIDO DINÁMICO --}}
            <main class="flex-grow-1 px-4">
                @yield('content')
            </main>

            {{-- PIE DE PÁGINA --}}
            <footer class="bg-white border-top text-center py-3 mt-5">
                <div class="container-fluid">
                    <span class="text-muted small">© {{ date('Y') }} <strong>SIGO COMPANY</strong> — Sistema Integral de Gestión de Encuestas</span>
                </div>
            </footer>

        </div>
    </div>

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>