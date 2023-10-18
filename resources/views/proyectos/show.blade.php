<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalles del Proyecto: {{ $proyecto->nombre }}</h1>

    <p>Categoría: {{ $proyecto->categoria }}</p>
    <p>Unidad Académica: {{ $proyecto->unidad_academica }}</p>

    <h2>Investigadores Asociados:</h2>

    <ul>
        @foreach($proyecto->investigadores as $investigador)
            <li>{{ $investigador->nombre }}</li>
        @endforeach
    </ul>
</body>
</html>