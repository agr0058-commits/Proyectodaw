<!DOCTYPE html>
<html>
<head>
    <title>Incidencias</title>
</head>
<body>
    <h1>Lista de incidencias</h1>
    <a href="{{ route('incidents.create') }}">➕ Nueva incidencia</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($incidents as $incident)
            <li>
                <b>{{ $incident->title }}</b> ({{ $incident->status }})
                - Cliente: {{ $incident->client->name }}
                <a href="{{ route('incidents.edit', $incident->id) }}">✏️ Editar</a>
                <form action="{{ route('incidents.destroy', $incident->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Borrar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>