@extends('layouts.app')

@section('title', 'Crear Encuesta - SIGO')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Crear Encuesta</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('encuestas.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Fecha y Hora</label>
                                <input type="datetime-local" class="form-control" name="FechaCreacion" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Estado del Usuario</label>
                                <select class="form-select" name="Estado" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Soporte</label>
                                <select class="form-select" name="Soporte" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Documento">Documento</option>
                                    <option value="Certificado">Certificado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Nivel Socioeconómico</label>
                                <select class="form-select" name="NivelSocioeconomico" required>
                                    <option value="">Seleccione...</option>
                                    <option value="A">Grupo A - Pobreza Extrema</option>
                                    <option value="B">Grupo B - Pobreza Moderada</option>
                                    <option value="C">Grupo C - Vulnerable</option>
                                    <option value="D">Grupo D - No Pobre</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-5">Guardar Encuesta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
