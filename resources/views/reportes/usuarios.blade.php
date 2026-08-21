@extends('layouts.app')

@section('title', 'Reporte de Usuarios - SIGO')

@section('content')

<style>
    :root {
        --sigo-primary: #4f46e5;
        --sigo-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    .card-header-sigo {
        background: var(--sigo-gradient);
        border-bottom: none;
    }

    .table-sigo thead {
        background-color: #f1f5f9;
        color: #475569;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .btn-export-csv {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(4px);
        transition: all 0.2s ease;
    }

    .btn-export-csv:hover {
        background: #ffffff;
        color: var(--sigo-primary);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .user-avatar-sm {
        width: 36px;
        height: 36px;
        background-color: rgba(79, 70, 229, 0.1);
        color: var(--sigo-primary);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.85rem;
    }
</style>

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        {{-- Header con acciones --}}
        <div class="card-header-sigo text-white p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-people-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Listado de Usuarios</h1>
                    <p class="text-white-50 small mb-0">Consulta y exportación del directorio general de usuarios registrados</p>
                </div>
            </div>

            <div>
                <a href="{{ route('reportes.usuarios.csv') }}" class="btn btn-export-csv rounded-3 fw-semibold px-3 py-2 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-download"></i> Descargar CSV
                </a>
            </div>
        </div>

        <div class="card-body p-4 bg-white">
            
            {{-- Tabla estilizada --}}
            <div class="table-responsive rounded-3 border">
                <table class="table table-hover align-middle mb-0 table-sigo">
                    <thead>
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Documento</th>
                            <th>Usuario</th>
                            <th>Correo Electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td class="ps-4 fw-bold text-primary">#{{ $usuario->idUsuario }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <i class="bi bi-card-heading me-1 text-secondary"></i>{{ $usuario->NumDocumento }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="user-avatar-sm">
                                            {{ strtoupper(substr($usuario->Nombre, 0, 1) . substr($usuario->Apellido, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold text-dark">{{ $usuario->Nombre }} {{ $usuario->Apellido }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-secondary small">
                                        <i class="bi bi-envelope me-1"></i>{{ $usuario->Correo }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-person-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No hay usuarios registrados actualmente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Botón Volver --}}
            <div class="mt-4 pt-2">
                <a href="{{ route('reportes.index') }}" class="btn btn-light border text-secondary fw-semibold rounded-3 px-4 py-2">
                    <i class="bi bi-arrow-left me-1"></i> Volver a Reportes
                </a>
            </div>

        </div>
    </div>
</div>

@endsection