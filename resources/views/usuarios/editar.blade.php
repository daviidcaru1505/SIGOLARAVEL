@extends('layouts.app')

@section('title', 'Editar Persona - SIGO')

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

    .form-control:focus, .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
    }

    .btn-sigo-primary {
        background: var(--sigo-gradient);
        color: #ffffff;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-sigo-primary:hover {
        opacity: 0.95;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
</style>

<div class="container py-4" style="max-width: 850px;">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        {{-- Encabezado --}}
        <div class="card-header-sigo text-white p-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-pencil-square fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Editar Persona</h1>
                    <p class="text-white-50 small mb-0">Actualiza la información general del usuario registrado</p>
                </div>
            </div>
            <a href="{{ route('usuarios.index') }}" class="btn-close btn-close-white" aria-label="Close"></a>
        </div>

        {{-- Formulario --}}
        <div class="card-body p-4 p-md-5 bg-white">
            <form action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    
                    {{-- Rol y Tipo Documento --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select rounded-3" id="idrol" name="idrol">
                                <option value="1" @selected($usuario->idRol == 1)>Asesor</option>
                                <option value="2" @selected($usuario->idRol == 2)>Encuestado</option>
                            </select>
                            <label for="idrol"><i class="bi bi-shield-person me-1"></i>Rol del Usuario</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select rounded-3" id="tipodoc" name="tipodoc">
                                <option value="CC" @selected($usuario->TipoDocumento == 'CC')>Cédula de Ciudadanía (CC)</option>
                                <option value="TI" @selected($usuario->TipoDocumento == 'TI')>Tarjeta de Identidad (TI)</option>
                                <option value="CE" @selected($usuario->TipoDocumento == 'CE')>Cédula de Extranjería (CE)</option>
                            </select>
                            <label for="tipodoc"><i class="bi bi-card-heading me-1"></i>Tipo de Documento</label>
                        </div>
                    </div>

                    {{-- Nombres y Apellidos --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="nombre" name="nombre"
                                value="{{ old('nombre', $usuario->Nombre) }}" placeholder="Nombre" />
                            <label for="nombre"><i class="bi bi-person me-1"></i>Nombre</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="apellido" name="apellido"
                                value="{{ old('apellido', $usuario->Apellido) }}" placeholder="Apellido" />
                            <label for="apellido"><i class="bi bi-person me-1"></i>Apellido</label>
                        </div>
                    </div>

                    {{-- Teléfono y Correo --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="telefono" name="telefono"
                                value="{{ old('telefono', $usuario->Telefono) }}" placeholder="Teléfono" />
                            <label for="telefono"><i class="bi bi-telephone me-1"></i>Teléfono</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control rounded-3" id="correo" name="correo"
                                value="{{ old('correo', $usuario->Correo) }}" placeholder="name@example.com" />
                            <label for="correo"><i class="bi bi-envelope me-1"></i>Correo Electrónico</label>
                        </div>
                    </div>

                    {{-- Dirección --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="dire" name="dire"
                                value="{{ old('dire', $usuario->Direccion) }}" placeholder="Dirección" />
                            <label for="dire"><i class="bi bi-geo-alt me-1"></i>Dirección</label>
                        </div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-3" id="contrasena" name="contrasena"
                                placeholder="Password" />
                            <label for="contrasena"><i class="bi bi-lock me-1"></i>Nueva Contraseña</label>
                        </div>
                        <div class="form-text text-muted ms-1 small">
                            <i class="bi bi-info-circle me-1"></i>Deje este campo en blanco si no desea modificar la contraseña actual.
                        </div>
                    </div>

                </div>

                {{-- Acciones --}}
                <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-light border text-secondary fw-semibold rounded-3 px-4 py-2">
                        Cancelar
                    </a>
                    <button class="btn btn-sigo-primary fw-semibold rounded-3 px-4 py-2" type="submit">
                        <i class="bi bi-check-lg me-1"></i> Guardar Cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection