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
            --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%);
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar superior con degradado idéntico */
        .navbar-sigo-guest {
            background: var(--sigo-gradient);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2);
            padding: 0.8rem 0;
        }

        /* Botón de acceso con estética neumórfica/moderna */
        .btn-guest-action {
            background-color: #ffffff;
            color: var(--sigo-primary);
            font-weight: 600;
            border-radius: 12px;
            padding: 0.5rem 1.25rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-guest-action:hover {
            background-color: #f1f5f9;
            color: #3730a3;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
        }

        .footer-sigo-guest {
            background-color: var(--sigo-dark);
            margin-top: auto;
        }
    </style>
</head>

<body>

    {{-- NAVEGACIÓN SUPERIOR PÚBLICA --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-sigo-guest sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4 text-white" href="{{ route('home') }}">
                <img src="{{ asset('img/logo-sigo.png') }}" alt="Logo SIGO" height="34" class="d-inline-block">
                <span>SIGO</span>
            </a>

            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-guest-action border-0 d-flex align-items-center gap-2">
                    <i class="bi bi-box-arrow-in-right fs-5"></i> Iniciar Sesión
                </a>
            </div>
        </div>
    </nav>

    {{-- ALERTAS GLOBALES --}}
    <div class="container mt-4">
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
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- PIE DE PÁGINA --}}
    <footer class="footer-sigo-guest text-white text-center py-4 mt-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center">
                <h5 class="fw-bold tracking-wide mb-1 text-white">SIGO COMPANY</h5>
                <p class="text-white-50 small mb-2">Sistema de Identificación de Grupos Socioeconómicos</p>
                <small class="text-white-50 opacity-75">© {{ date('Y') }} Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>

    {{-- Script Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>