<!-- resources/views/proyectos/registrar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRO</title>
</head>
<body>
  <!-- resources/views/proyectos/registrar.blade.php -->

  <h1>Registrar Nuevo Proyecto</h1>

  <form action="{{ url('/proyectos/registrar') }}" method="post">
      @csrf

      <label for="nombre">Nombre del Proyecto:</label>
      <input type="text" name="nombre" required><br>

      <label for="categoria">Categoría:</label>
      <select name="categoria" required>
          <option value="formativo">Formativo</option>
          <option value="profesionalizante">Profesionalizante</option>
          <option value="institucional">Institucional</option>
          <option value="tecnologico">Tecnológico</option>
          <option value="militar">Militar</option>
      </select><br>

      <label for="unidad_academica">Unidad Académica:</label>
      <select name="unidad_academica" required>
          <option value="UALP">UALP</option>
          <option value="UASC">UASC</option>
          <option value="UACB">UACB</option>
          <option value="UAT">UAT</option>
          <option value="UAR">UAR</option>
      </select><br>
      <label for="brochure_path">Dirección de Brochure</label>
      <input type="text" name="brochure_path" required><br>
      
      <button type="submit">Registrar Proyecto</button>
  </form>

</body>
</html>
