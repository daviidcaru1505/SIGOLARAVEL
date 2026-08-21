<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIGO')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <!-- ENCABEZADO -->
    <header class="p-3 mb-4 bg-primary shadow">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a class="navbar-brand d-flex align-items-center me-3" href="{{ route('principal') }}">
                    <img src="{{ asset('img/logo-sigo.png') }}" alt="Logo SIGO" width="45" height="30">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="{{ route('principal') }}" class="nav-link px-3 text-white">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('encuestas.create') }}" class="nav-link px-3 text-white">Crear Encuesta</a>
                    </li>
                    <li>
                        <a href="{{ route('consultas.create') }}" class="nav-link px-3 text-white">Consultar Usuario</a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios.index') }}" class="nav-link px-3 text-white">Editar Usuario</a>
                    </li>
                    <li>
                        <a href="{{ route('reportes.index') }}" class="nav-link px-3 text-white">Crear reportes</a>
                    </li>
                </ul>

                <div class="dropdown text-end">
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-white" data-bs-toggle="dropdown">
                        <img src="{{ asset('img/usuario.png') }}" alt="Usuario" width="35" height="35"
                            class="rounded-circle border border-white">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><span class="dropdown-item-text fw-bold">{{ session('usuario_nombre') }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <div class="container">
        @if (session('exito'))
            <div class="alert alert-success">{{ session('exito') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <h5>SIGO COMPANY</h5>
            <p class="mb-0">Sistema Integral de Gestión de Encuestas</p>
            <small>© {{ date('Y') }} Todos los derechos reservados</small>
        </div>
    </footer>

</body>

</html>
