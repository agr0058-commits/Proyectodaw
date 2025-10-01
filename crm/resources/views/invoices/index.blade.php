@extends('layouts.app')

@section('content')
<div class="container mt-4 bg-white dark:bg-gray-800 text-dark dark:text-gray-200 rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">💸 Lista de facturas</h2>
        <a href="{{ route('invoices.create') }}" class="btn btn-success">➕ Nueva factura</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Cliente</th>
                        <th>Importe</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->client->name ?? '-' }}</td>
                            <td>{{ $invoice->amount }} €</td>
                            <td>{{ $invoice->status }}</td>
                            <td>{{ $invoice->issued_at }}</td>
                            <td class="text-end">
                                <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas borrar esta factura?')">🗑️ Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay facturas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection