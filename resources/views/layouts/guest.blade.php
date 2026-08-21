<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIGO')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">SIGO</a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-success">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
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

    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">
            <h5>SIGO COMPANY</h5>
            <p>Sistema de Identificación de Grupos Socioeconómicos</p>
            <p>© {{ date('Y') }} Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
