<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Cliente</title>
</head>
<body>
    <h1>Crear cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        Nombre: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Teléfono: <input type="text" name="phone"><br>
        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('clients.index') }}">⬅️ Volver</a>
</body>
</html>