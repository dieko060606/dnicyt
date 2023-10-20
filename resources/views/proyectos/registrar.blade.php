<!-- resources/views/proyectos/registrar.blade.php -->
@extends('layouts.app')

@section('content')
  <!-- resources/views/proyectos/registrar.blade.php -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-4">Registrar Nuevo Proyecto</h1>
        <form action="{{ url('/proyectos/registrar') }}" method="post">
          @csrf

          <div class="form-group">
            <label for="nombre">Nombre del Proyecto:</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>

          <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" name="categoria" required>
              <option value="formativo">Formativo</option>
              <option value="profesionalizante">Profesionalizante</option>
              <option value="institucional">Institucional</option>
              <option value="tecnologico">Tecnológico</option>
              <option value="militar">Militar</option>
            </select>
          </div>

          <div class="form-group">
            <label for="unidad_academica">Unidad Académica:</label>
            <select class="form-control" name="unidad_academica" required>
              <option value="UALP">UALP</option>
              <option value="UASC">UASC</option>
              <option value="UACB">UACB</option>
              <option value="UAT">UAT</option>
              <option value="UAR">UAR</option>
            </select>
          </div>

          <div class="form-group">
            <label for="brochure_path">Dirección de Brochure</label>
            <input type="text" class="form-control" name="brochure_path" required>
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Registrar Proyecto</button>
        </form>
      </div>
    </div>
  </div>

@endsection