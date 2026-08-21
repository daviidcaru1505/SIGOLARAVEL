@extends('layouts.app')

@section('title', 'Editar Usuarios - SIGO')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0">Listado de Personas Registradas</h2>
            </div>

            <div class="card-body">
                <p class="text-muted">
                    Desde esta sección puede consultar y editar la información de los usuarios registrados en el sistema SIGO.
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Correo Electrónico</th>
                                <th>Tipo de Documento</th>
                                <th>Dirección</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->NumDocumento }}</td>
                                    <td>{{ $usuario->Nombre }}</td>
                                    <td>{{ $usuario->Apellido }}</td>
                                    <td>{{ $usuario->Telefono }}</td>
                                    <td>{{ $usuario->Correo }}</td>
                                    <td>{{ $usuario->TipoDocumento }}</td>
                                    <td>{{ $usuario->Direccion }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.edit', $usuario->idUsuario) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
