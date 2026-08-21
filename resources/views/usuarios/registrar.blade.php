@extends('layouts.guest')

@section('title', 'Regístrate - SIGO')

@section('content')

    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Regístrate</h1>
                    <a href="{{ route('login') }}"><button type="button" class="btn-close" aria-label="Close"></button></a>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('usuarios.store') }}" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <select class="form-select" name="idrol">
                                <option value="1">Asesor</option>
                                <option value="2">Encuestado</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="nombre" name="nombre"
                                value="{{ old('nombre') }}" placeholder="Nombre" />
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="apellido" name="apellido"
                                value="{{ old('apellido') }}" placeholder="Apellido" />
                            <label for="apellido">Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="telefono" name="telefono"
                                value="{{ old('telefono') }}" placeholder="Teléfono" />
                            <label for="telefono">Teléfono</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="dire" name="dire"
                                value="{{ old('dire') }}" placeholder="Dirección" />
                            <label for="dire">Dirección</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="correo" name="correo"
                                value="{{ old('correo') }}" placeholder="name@example.com" />
                            <label for="correo">Correo Electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="contrasena" name="contrasena"
                                placeholder="Password" />
                            <label for="contrasena">Nueva contraseña</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="tipodoc">
                                <option value="CC">Cédula</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="CE">Cédula Extranjera</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="numdocumento" name="numdocumento"
                                value="{{ old('numdocumento') }}" placeholder="Documento de identidad" />
                            <label for="numdocumento">Documento de Identidad</label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Registrarse</button>
                        <small class="text-body-secondary">Al hacer clic en Registrarse, acepta los términos de uso.</small>
                        <hr class="my-4" />
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
