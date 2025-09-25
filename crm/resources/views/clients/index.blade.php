<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de clientes</h1>
    <a href="{{ route('clients.create') }}">➕ Nuevo cliente</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($clients as $client)
            <li>
                {{ $client->name }} - {{ $client->email }} - {{ $client->phone }}
                <a href="{{ route('clients.edit', $client->id) }}">✏️ Editar</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Borrar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>