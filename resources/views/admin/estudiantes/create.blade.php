@extends('adminlte::page')

@section('title', 'Registro Estudiante')

@section('content_header')
    <h1>Nuevo Estudiante</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Estudiante</h3>
            </div>
            <form action="{{ route('admin.estudiantes.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese nombre">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingrese apellido">
                        @error('apellido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                            placeholder="Ingrese telefono">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button id="btnGuardarEst" type="submit" class="btn btn-primary float-right"><i
                            class="fas mr-2 fa-save"></i>Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop


{{-- @section('js')
    <script>
        $(document).ready(function() {
            $('#btnGuardarEst').click(function() {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                );
            });

        })
    </script>
@stop --}}
