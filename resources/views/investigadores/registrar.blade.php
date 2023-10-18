<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/investigadores/registrar.blade.php -->

    <h1>Registrar Nuevo Investigador</h1>

    <form action="{{ url('/investigadores/registrar') }}" method="post">
        @csrf

        <label for="nombre">Nombre del Investigador:</label>
        <input type="text" name="nombre" required><br>

        <label for="unidad_academica">Unidad Académica:</label>
        <select name="unidad_academica" required>
            <option value="UALP">UALP</option>
            <option value="UASC">UASC</option>
            <option value="UACB">UACB</option>
            <option value="UAT">UAT</option>
            <option value="UAR">UAR</option>
        </select><br>

        <label for="proyecto_id">Proyecto Asociado:</label>
        <select name="proyecto_id" required>
            @foreach($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
            @endforeach
        </select><br>

        <button type="submit">Registrar Investigador</button>
    </form>

</body>
</html>