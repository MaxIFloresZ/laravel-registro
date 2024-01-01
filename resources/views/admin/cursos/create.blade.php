@extends('adminlte::page')

@section('title', 'Registro Curso')

@section('content_header')
    <h1>Nuevo Curso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Curso</h3>
            </div>
            <form action="{{ route('admin.cursos.store') }}" method="POST">
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
                        <label for="descripcion">Descripción</label>
                        {{-- <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingrese apellido"> --}}
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aforo">Aforo</label>
                        <input type="text" class="form-control" name="aforo" id="aforo"
                            placeholder="Ingrese aforo del curso">
                        @error('aforo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" id="telefono"
                            placeholder="Ingrese Fecha Inicio">
                        @error('fechaInicio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Estudios</label>
                        <input type="date" class="form-control" name="fechaFin" id="fechaFin" placeholder="Ingrese Fin">
                        @error('fechaFin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_profe ">Profesor</label>
                        {{-- <input type="date" class="form-control" name="fechaFin" id="fechaFin"
                            placeholder="Ingrese Fin"> --}}
                        <select class="form-control" name="id_profe">
                            @forelse ($profesores as $profesor)
                                <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                            @empty
                                <option>Default select</option>
                            @endforelse

                        </select>
                        @error('id_profe')
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
