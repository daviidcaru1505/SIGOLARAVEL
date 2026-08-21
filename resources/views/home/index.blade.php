@extends('layouts.guest')

@section('title', 'SIGO - Sistema de Identificación de Grupos Socioeconómicos')

@section('content')

    <!-- PORTADA -->
    <div class="container-fluid bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-3 fw-bold">Bienvenido a SIGO</h1>
            <p class="lead">
                Sistema de Identificación de Grupos Socioeconómicos para el apoyo
                a procesos de caracterización socioeconómica y gestión
                de información relacionada con el Sisbén.
            </p>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg mt-3">Acceder al Sistema</a>
        </div>
    </div>

    <!-- INFORMACIÓN GENERAL -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-primary">¿Qué es SIGO?</h2>
                <p>
                    SIGO es un Sistema de Identificación de Grupos Socioeconómicos diseñado
                    para facilitar el registro, consulta y administración de
                    información relacionada con los hogares y su clasificación
                    socioeconómica.
                </p>
                <p>
                    La plataforma permite almacenar información de usuarios,
                    encuestas, novedades y consultas de manera organizada,
                    eficiente y segura.
                </p>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40" class="img-fluid rounded shadow" alt="Sistema de Gestión">
            </div>
        </div>
    </div>

    <!-- SISBÉN -->
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3>¿Qué es el Sisbén?</h3>
            </div>
            <div class="card-body">
                <p>
                    Es una metodología utilizada
                    por el Gobierno de Colombia para identificar y clasificar
                    a la población según sus condiciones socioeconómicas.
                </p>
                <p>
                    La información obtenida mediante encuestas permite orientar
                    la inversión social y focalizar programas gubernamentales
                    destinados a mejorar la calidad de vida de la población.
                </p>
            </div>
        </div>
    </div>

    <!-- MÓDULOS -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Funcionalidades del Sistema</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h1>📝</h1>
                        <h5>Encuestas</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success text-center">
                    <div class="card-body">
                        <h1>👥</h1>
                        <h5>Usuarios</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning text-center">
                    <div class="card-body">
                        <h1>📊</h1>
                        <h5>Consultas</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger text-center">
                    <div class="card-body">
                        <h1>📋</h1>
                        <h5>Novedades</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CLASIFICACIÓN SIGO -->
    <div class="container mt-5 mb-5">
        <h2 class="text-center text-primary">Clasificación SIGO</h2>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Grupo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-danger">
                        <td>A</td>
                        <td>Pobreza extrema.</td>
                    </tr>
                    <tr class="table-warning">
                        <td>B</td>
                        <td>Pobreza moderada.</td>
                    </tr>
                    <tr class="table-info">
                        <td>C</td>
                        <td>Población vulnerable.</td>
                    </tr>
                    <tr class="table-success">
                        <td>D</td>
                        <td>Población no pobre.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
