<!DOCTYPE html>
<html>
<head>
    <title>Nueva Incidencia</title>
</head>
<body>
    <h1>Crear incidencia</h1>

    <form action="{{ route('incidents.store') }}" method="POST">
        @csrf
        Cliente:
        <select name="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select><br>

        Título: <input type="text" name="title" required><br>
        Descripción: <textarea name="description"></textarea><br>
        Estado:
        <select name="status" required>
            <option value="open">Abierta</option>
            <option value="in_progress">En progreso</option>
            <option value="closed">Cerrada</option>
        </select><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('incidents.index') }}">⬅️ Volver</a>
</body>
</html>