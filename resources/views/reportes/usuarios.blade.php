@extends('layouts.app')

@section('title', 'Reporte de Usuarios - SIGO')

@section('content')

    <div class="container">
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">LISTADO DE USUARIOS</h4>
                <a href="{{ route('reportes.usuarios.csv') }}" class="btn btn-light btn-sm">⬇️ Descargar CSV</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->idUsuario }}</td>
                                    <td>{{ $usuario->NumDocumento }}</td>
                                    <td>{{ $usuario->Nombre }}</td>
                                    <td>{{ $usuario->Apellido }}</td>
                                    <td>{{ $usuario->Correo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

@endsection
