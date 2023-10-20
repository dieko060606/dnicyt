@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-4">Registrar Nuevo Investigador</h1>
        <form action="{{ url('/investigadores/registrar') }}" method="post">
          @csrf

          <div class="form-group">
            <label for="nombre">Nombre del Investigador:</label>
            <input type="text" class="form-control" name="nombre" required>
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
            <label for="proyecto_id">Proyecto Asociado:</label>
            <select class="form-control" name="proyecto_id" required>
              @foreach($proyectos as $proyecto)
              <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Registrar Investigador</button>
        </form>
      </div>
    </div>
  </div>
  @endsection