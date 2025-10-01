@extends('layouts.app')

@section('content')
<div class="container mt-4 bg-white dark:bg-gray-800 text-dark dark:text-gray-200 rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">👥 Lista de clientes</h2>
        <a href="{{ route('clients.create') }}" class="btn btn-success">➕ Nuevo cliente</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td class="text-end">
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas borrar este cliente?')">🗑️ Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection