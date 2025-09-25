<!DOCTYPE html>
<html>
<head>
    <title>Editar Incidencia</title>
</head>
<body>
    <h1>Editar incidencia</h1>

    <form action="{{ route('incidents.update', $incident->id) }}" method="POST">
        @csrf
        @method('PUT')
        Cliente:
        <select name="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" @if($client->id == $incident->client_id) selected @endif>
                    {{ $client->name }}
                </option>
            @endforeach
        </select><br>

        Título: <input type="text" name="title" value="{{ $incident->title }}" required><br>
        Descripción: <textarea name="description">{{ $incident->description }}</textarea><br>
        Estado:
        <select name="status" required>
            <option value="open" @if($incident->status == 'open') selected @endif>Abierta</option>
            <option value="in_progress" @if($incident->status == 'in_progress') selected @endif>En progreso</option>
            <option value="closed" @if($incident->status == 'closed') selected @endif>Cerrada</option>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('incidents.index') }}">⬅️ Volver</a>
</body>
</html>