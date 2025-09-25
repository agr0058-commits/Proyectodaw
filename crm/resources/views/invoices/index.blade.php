<!DOCTYPE html>
<html>
<head>
    <title>Facturas</title>
</head>
<body>
    <h1>Lista de facturas</h1>
    <a href="{{ route('invoices.create') }}">➕ Nueva factura</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($invoices as $invoice)
            <li>
                Cliente: {{ $invoice->client->name }} |
                Importe: {{ $invoice->amount }} € |
                Vencimiento: {{ $invoice->due_date }} |
                Estado: {{ $invoice->status }}

                <a href="{{ route('invoices.edit', $invoice->id) }}">✏️ Editar</a>
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Borrar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>