@extends('adminlte::page')

@section('title', 'Editar Estudiantes')

@section('content_header')
    <h1>Editar datos del estudiante <b>{{ $estudiante->nombre }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Estudiante</h3>
            </div>
            <form action="{{ route('admin.estudiantes.update',$estudiante->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $estudiante->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            value="{{ $estudiante->apellido }}">
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni"
                            value="{{ $estudiante->dni }}">

                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                            value="{{ $estudiante->telefono }}">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right"><i
                            class="fas mr-2 fa-save"></i>Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop
