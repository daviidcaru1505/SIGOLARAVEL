@extends('layouts.guest')

@section('title', 'Inicio de Sesión - SIGO')

@section('content')

    <div class="container">
        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 mb-5">
                <h1 class="display-4 text-primary fw-bold">Bienvenido a SIGO</h1>
                <p class="lead">
                    Sistema Integral de Gestión de Encuestas para la administración
                    y consulta de información relacionada con el Sisbén.
                </p>

                <div class="alert alert-info">
                    <h5>¿Qué es el Sisbén?</h5>
                    <p class="mb-0">
                        El Sistema de Identificación de Potenciales Beneficiarios
                        de Programas Sociales (Sisbén) permite clasificar a la
                        población colombiana según sus condiciones socioeconómicas.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Inicio de Sesión</h3>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center">
                            <img src="{{ asset('img/usuario.png') }}" alt="Usuario" width="120" height="120" class="mb-3">
                        </div>

                        <p class="text-center text-muted">Ingrese sus credenciales para acceder al sistema.</p>

                        <form action="{{ route('login.store') }}" method="post">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="correo"
                                    placeholder="name@example.com" value="{{ old('correo') }}" required>
                                <label for="floatingInput">Correo Electrónico</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="contrasena"
                                    placeholder="Password" required>
                                <label for="floatingPassword">Contraseña</label>
                            </div>

                            <button class="btn btn-primary w-100 py-2" type="submit">Ingresar</button>

                            <div class="text-center mt-3">
                                <a href="{{ route('usuarios.create') }}" class="text-decoration-none">
                                    ¿No está registrado? Regístrese
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
