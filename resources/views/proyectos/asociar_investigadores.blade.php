<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Asociar Investigadores a {{ $proyecto->nombre }}</h1>

    <form action="{{ url("/proyecto/{$proyecto->id}/asociar") }}" method="post">
        @csrf

        <label for="investigadores">Selecciona los Investigadores:</label><br>

        @foreach($investigadores as $investigador)
            <input type="checkbox" name="investigadores[]" value="{{ $investigador->id }}"> {{ $investigador->nombre }}<br>
        @endforeach

        <button type="submit">Asociar Investigadores</button>
    </form>
</body>
</html>