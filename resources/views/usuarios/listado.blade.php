@extends('layouts.app')

@section('title', 'Gestionar Usuarios - SIGO')

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

    .btn-action-edit {
        background-color: #fef3c7;
        color: #d97706;
        border: 1px solid #fde68a;
        transition: all 0.2s ease;
    }

    .btn-action-edit:hover {
        background-color: #d97706;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(217, 119, 6, 0.25);
    }

    .btn-action-add {
        background-color: #e0e7ff;
        color: #4338ca;
        border: 1px solid #c7d2fe;
        transition: all 0.2s ease;
    }

    .btn-action-add:hover {
        background-color: #4338ca;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(67, 56, 202, 0.25);
    }
</style>

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        {{-- Encabezado --}}
        <div class="card-header-sigo text-white p-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-people-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Listado de Personas Registradas</h1>
                    <p class="text-white-50 small mb-0">Consulta y actualización de la información de los usuarios del sistema</p>
                </div>
            </div>
        </div>

        <div class="card-body p-4 bg-white">
            
            {{-- Tabla de Usuarios --}}
            <div class="table-responsive rounded-3 border">
                <table class="table table-hover align-middle mb-0 table-sigo">
                    <thead>
                        <tr>
                            <th class="ps-4">Documento</th>
                            <th>Usuario</th>
                            <th>Contacto</th>
                            <th>Dirección</th>
                            <th class="text-center pe-4">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                {{-- Tipo y Número de Documento --}}
                                <td class="ps-4">
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <strong class="text-primary me-1">{{ $usuario->TipoDocumento }}</strong> {{ $usuario->NumDocumento }}
                                    </span>
                                </td>

                                {{-- Nombre completo y Avatar --}}
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="user-avatar-sm">
                                            {{ strtoupper(substr($usuario->Nombre, 0, 1) . substr($usuario->Apellido, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark">{{ $usuario->Nombre }} {{ $usuario->Apellido }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Teléfono y Correo --}}
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <span class="text-secondary small">
                                            <i class="bi bi-envelope me-1 text-muted"></i>{{ $usuario->Correo }}
                                        </span>
                                        <span class="text-secondary small">
                                            <i class="bi bi-telephone me-1 text-muted"></i>{{ $usuario->Telefono ?? 'Sin teléfono' }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Dirección --}}
                                <td>
                                    <span class="text-secondary small">
                                        <i class="bi bi-geo-alt me-1 text-muted"></i>{{ $usuario->Direccion ?? 'No registrada' }}
                                    </span>
                                </td>

                                {{-- Botones de Acción --}}
                                <td class="text-center pe-4">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        {{-- Botón de Edición --}}
                                        <a href="{{ route('usuarios.edit', $usuario->idUsuario) }}" 
                                           class="btn btn-action-edit btn-sm rounded-3 px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>

                                        {{-- Botón para Inclusión / Agregar Integrante a la Novedad --}}
                                        <a href="{{ route('novedades.crear', ['usuario_id' => $usuario->idUsuario]) }}" 
                                           class="btn btn-action-add btn-sm rounded-3 px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-person-plus-fill"></i> + Integrante
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-person-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No hay personas registradas en la base de datos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection