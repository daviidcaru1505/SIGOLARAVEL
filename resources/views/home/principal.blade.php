@extends('layouts.app')

@section('title', 'SIGO - Principal')

@section('content')

    <div class="container mb-5">
        <div class="p-5 text-center bg-white rounded-4 shadow">
            <h1 class="display-4 text-primary">SIGO</h1>
            <h3 class="text-secondary">Sistema de Identificación de Grupos Socioeconómicos</h3>
            <p class="lead mt-3">
                Administra información de usuarios, realiza encuestas y consulta
                datos relacionados con la clasificación socioeconómica del Sisbén.
            </p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h2>¿Qué es el Sisbén?</h2>
            </div>

            <div class="card-body">
                <p class="fs-5">
                    El Sistema de Identificación de Potenciales Beneficiarios de Programas Sociales
                    (Sisbén) es una herramienta utilizada por el Gobierno de Colombia para clasificar
                    a la población según sus condiciones de vida e ingresos.
                </p>

                <div class="alert alert-info">
                    La información recolectada permite focalizar subsidios y programas
                    sociales para los hogares que más los necesitan.
                </div>

                <h3 class="text-primary mt-4">¿Cómo funciona?</h3>

                <div class="row mt-4">
                    <div class="col-md-3 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-body text-center">
                                <h1>📝</h1>
                                <h5>Encuesta</h5>
                                <p>Se realiza una encuesta a los integrantes del hogar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-body text-center">
                                <h1>🏠</h1>
                                <h5>Información</h5>
                                <p>Se recopilan datos de vivienda, salud y educación.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-warning h-100">
                            <div class="card-body text-center">
                                <h1>📊</h1>
                                <h5>Clasificación</h5>
                                <p>El sistema analiza la información obtenida.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-danger h-100">
                            <div class="card-body text-center">
                                <h1>🎯</h1>
                                <h5>Beneficios</h5>
                                <p>Los programas sociales utilizan esta clasificación.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-primary mt-4">Clasificación SIGO</h3>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Grupo</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-danger">
                                <td><strong>A</strong></td>
                                <td>Población en pobreza extrema.</td>
                            </tr>
                            <tr class="table-warning">
                                <td><strong>B</strong></td>
                                <td>Población en pobreza moderada.</td>
                            </tr>
                            <tr class="table-info">
                                <td><strong>C</strong></td>
                                <td>Hogares vulnerables.</td>
                            </tr>
                            <tr class="table-success">
                                <td><strong>D</strong></td>
                                <td>Población no pobre ni vulnerable.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
