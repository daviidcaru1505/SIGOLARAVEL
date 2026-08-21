@extends('layouts.guest')

@section('title', 'Regístrate - SIGO')

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

<div class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 800px;">
        
        {{-- Encabezado --}}
        <div class="card-header-sigo text-white p-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle" style="width: 48px; height: 48px;">
                    <i class="bi bi-person-plus-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h1 class="fs-4 fw-bold mb-0">Crear una Cuenta</h1>
                    <p class="text-white-50 small mb-0">Completa el formulario para registrarte en la plataforma SIGO</p>
                </div>
            </div>
            <a href="{{ route('login') }}" class="btn-close btn-close-white" aria-label="Close"></a>
        </div>

        {{-- Cuerpo del Formulario --}}
        <div class="card-body p-4 p-md-5 bg-white">

            {{-- Alerta general de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                        <div>Por favor verifica los errores en el formulario antes de continuar.</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="post">
                @csrf

                <div class="row g-3">
                    
                    {{-- Rol y Tipo de Documento --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select rounded-3 @error('idrol') is-invalid @enderror" id="idrol" name="idrol">
                                <option value="1" @selected(old('idrol') == '1')>Asesor</option>
                                <option value="2" @selected(old('idrol') == '2' || !old('idrol'))>Encuestado</option>
                            </select>
                            <label for="idrol"><i class="bi bi-shield-person me-1"></i>Tipo de Usuario</label>
                            @error('idrol')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select rounded-3 @error('tipodoc') is-invalid @enderror" id="tipodoc" name="tipodoc">
                                <option value="CC" @selected(old('tipodoc') == 'CC')>Cédula de Ciudadanía (CC)</option>
                                <option value="TI" @selected(old('tipodoc') == 'TI')>Tarjeta de Identidad (TI)</option>
                                <option value="CE" @selected(old('tipodoc') == 'CE')>Cédula de Extranjería (CE)</option>
                            </select>
                            <label for="tipodoc"><i class="bi bi-card-heading me-1"></i>Tipo de Documento</label>
                            @error('tipodoc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Número de Documento --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3 @error('numdocumento') is-invalid @enderror" id="numdocumento" name="numdocumento"
                                value="{{ old('numdocumento') }}" placeholder="Documento de identidad" required />
                            <label for="numdocumento"><i class="bi bi-hash me-1"></i>Número de Documento de Identidad</label>
                            @error('numdocumento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Nombres y Apellidos --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3 @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                                value="{{ old('nombre') }}" placeholder="Nombre" required />
                            <label for="nombre"><i class="bi bi-person me-1"></i>Nombre</label>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3 @error('apellido') is-invalid @enderror" id="apellido" name="apellido"
                                value="{{ old('apellido') }}" placeholder="Apellido" required />
                            <label for="apellido"><i class="bi bi-person me-1"></i>Apellido</label>
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Teléfono y Correo --}}
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3 @error('telefono') is-invalid @enderror" id="telefono" name="telefono"
                                value="{{ old('telefono') }}" placeholder="Teléfono" />
                            <label for="telefono"><i class="bi bi-telephone me-1"></i>Teléfono</label>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control rounded-3 @error('correo') is-invalid @enderror" id="correo" name="correo"
                                value="{{ old('correo') }}" placeholder="name@example.com" required />
                            <label for="correo"><i class="bi bi-envelope me-1"></i>Correo Electrónico</label>
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Dirección --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3 @error('dire') is-invalid @enderror" id="dire" name="dire"
                                value="{{ old('dire') }}" placeholder="Dirección" />
                            <label for="dire"><i class="bi bi-geo-alt me-1"></i>Dirección</label>
                            @error('dire')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-3 @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena"
                                placeholder="Password" required />
                            <label for="contrasena"><i class="bi bi-lock me-1"></i>Contraseña</label>
                            @error('contrasena')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- Botón y Términos --}}
                <div class="mt-4 pt-2">
                    <button class="w-100 btn btn-sigo-primary btn-lg rounded-3 fw-semibold py-3" type="submit">
                        <i class="bi bi-check-circle me-1"></i> Completar Registro
                    </button>
                    <p class="text-muted text-center small mt-3 mb-0">
                        Al hacer clic en <strong>Completar Registro</strong>, aceptas los términos de uso y tratamiento de datos del sistema.
                    </p>
                </div>

                <hr class="my-4" />

                {{-- Enlace a Login --}}
                <div class="text-center">
                    <span class="text-secondary small">¿Ya tienes una cuenta registrada?</span>
                    <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none ms-1 small">
                        Inicia sesión aquí
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection