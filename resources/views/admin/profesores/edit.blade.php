@extends('adminlte::page')

@section('title', 'Editar Profesor')

@section('content_header')
    <h1>Editar datos del Profesor <b>{{ $profesor->nombre }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Profesor</h3>
            </div>
            <form action="{{ route('admin.profesores.update',$profesor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $profesor->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            value="{{ $profesor->apellido }}">
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni"
                            value="{{ $profesor->dni }}">

                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                            value="{{ $profesor->telefono }}">
                    </div>
                    <div class="form-group">
                        <label for="estudios">Estudios</label>
                        <input type="text" class="form-control" name="estudios" id="telefono"
                            value="{{ $profesor->estudios }}">
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
