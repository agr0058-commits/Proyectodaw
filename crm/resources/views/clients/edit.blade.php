<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar cliente</h1>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        Nombre: <input type="text" name="name" value="{{ $client->name }}" required><br>
        Email: <input type="email" name="email" value="{{ $client->email }}" required><br>
        Teléfono: <input type="text" name="phone" value="{{ $client->phone }}"><br>
        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('clients.index') }}">⬅️ Volver</a>
</body>
</html>