@extends('layouts.app')

@section('content')
<div class="container mt-4 bg-white dark:bg-gray-800 text-dark dark:text-gray-200 rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">🛠️ Lista de incidencias</h2>
        <a href="{{ route('incidents.create') }}" class="btn btn-success">➕ Nueva incidencia</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Cliente</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($incidents as $incident)
                        <tr>
                            <td>{{ $incident->client->name ?? '-' }}</td>
                            <td>{{ $incident->description }}</td>
                            <td>{{ $incident->status }}</td>
                            <td class="text-end">
                                <a href="{{ route('incidents.edit', $incident) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('incidents.destroy', $incident) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas borrar esta incidencia?')">🗑️ Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay incidencias registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection