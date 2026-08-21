@extends('layouts.app')

@section('title', 'Resultado Consulta - SIGO')

@section('content')

    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h3 class="mb-0">RESULTADO DE LA CONSULTA</h3>
            </div>

            <div class="card-body">
                @if ($resultados->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID Usuario</th>
                                    <th>Documento</th>
                                    <th>ID Núcleo Familiar</th>
                                    <th>ID Encuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $fila)
                                    <tr>
                                        <td>{{ $fila->idUsuario }}</td>
                                        <td>{{ $fila->NumDocumento }}</td>
                                        <td>{{ $fila->idNucleoFamiliar }}</td>
                                        <td>{{ $fila->idEncuesta }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger text-center">No se encontraron registros.</div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('consultas.create') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>

@endsection
