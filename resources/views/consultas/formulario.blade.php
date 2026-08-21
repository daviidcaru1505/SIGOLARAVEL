@extends('layouts.app')

@section('title', 'Consultar Usuarios - SIGO')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">CONSULTAR USUARIOS</h3>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('consultas.buscar') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Número de Documento</label>
                                <input type="number" class="form-control" name="NumDocumento"
                                    placeholder="Ingrese el número de documento" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-4">Consultar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
