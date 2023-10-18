@extends('layouts.app')

@section('content')
    <style>body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #555;
        }
    </style>
    <div class="container">
        <h1>Formulario de Evaluación</h1>
        <form action="#" method="post">
            <div class="form-group">
            <label for="proyecto">Proyecto</label>
                <select id="proyecto" name="proyecto" required>
                    @foreach($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" data-categoria="{{ $proyecto->categoria }}">{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="categoria" readonly>
            </div>

            <div class="form-group">
                <label for="evaluacion">Evaluación</label>
                <textarea id="evaluacion" name="evaluacion" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar Evaluación</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#proyecto').on('change', function() {
                // Obtener la categoría asociada al proyecto seleccionado
                var categoria = $('#proyecto option:selected').data('categoria');

                // Actualizar el campo de texto con la categoría
                $('#categoria').val(categoria);
            });
        });
    </script>

@endsection
