<!DOCTYPE html>
<html>
<head>
    <title>Nueva Factura</title>
</head>
<body>
    <h1>Crear factura</h1>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        Cliente:
        <select name="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select><br>

        Importe: <input type="number" step="0.01" name="amount" required><br>
        Fecha de vencimiento: <input type="date" name="due_date" required><br>
        Estado:
        <select name="status" required>
            <option value="pending">Pendiente</option>
            <option value="paid">Pagada</option>
            <option value="overdue">Vencida</option>
        </select><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('invoices.index') }}">⬅️ Volver</a>
</body>
</html>
