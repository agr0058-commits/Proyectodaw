<!DOCTYPE html>
<html>
<head>
    <title>Editar Factura</title>
</head>
<body>
    <h1>Editar factura</h1>

    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        Cliente:
        <select name="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" @if($client->id == $invoice->client_id) selected @endif>
                    {{ $client->name }}
                </option>
            @endforeach
        </select><br>

        Importe: <input type="number" step="0.01" name="amount" value="{{ $invoice->amount }}" required><br>
        Fecha de vencimiento: <input type="date" name="due_date" value="{{ $invoice->due_date }}" required><br>
        Estado:
        <select name="status" required>
            <option value="pending" @if($invoice->status == 'pending') selected @endif>Pendiente</option>
            <option value="paid" @if($invoice->status == 'paid') selected @endif>Pagada</option>
            <option value="overdue" @if($invoice->status == 'overdue') selected @endif>Vencida</option>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('invoices.index') }}">⬅️ Volver</a>
</body>
</html>
