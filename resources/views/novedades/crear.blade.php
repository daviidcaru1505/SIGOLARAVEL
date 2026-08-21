@extends('layouts.app')

@section('title', 'Gestionar Novedades - SIGO')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h1 class="fs-3 mb-0">GESTIONAR NOVEDADES</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('novedades.store') }}" method="post">
                            @csrf

                            <div class="mb-3 mt-3">
                                <label class="form-label">Encuesta relacionada</label>
                                <select class="form-select" name="idEncuesta" required>
                                    <option value="">-- Seleccione la encuesta --</option>
                                    @foreach ($encuestas as $encuesta)
                                        <option value="{{ $encuesta->idEncuesta }}">
                                            #{{ $encuesta->idEncuesta }} - {{ $encuesta->FechaCreacion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Tipo de Novedad</label>
                                <select class="form-select" name="TipoNovedad" required>
                                    <option value="">-- Seleccione la novedad --</option>
                                    <option value="Cambio de dirección">Cambio de dirección</option>
                                    <option value="Cambio de ingresos">Cambio de ingresos</option>
                                    <option value="Fallecimiento">Fallecimiento</option>
                                    <option value="Nacimiento">Nacimiento</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="Descripcion" maxlength="45" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Fecha y Hora</label>
                                <input type="datetime-local" class="form-control" name="Fecha" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="Estado" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Resuelta">Resuelta</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
