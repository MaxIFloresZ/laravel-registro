@extends('adminlte::page')

@section('title', 'Editar Profesor')

@section('content_header')
    <h1>Editar datos del Curso <b>{{ $cursos->nombre }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Cruso</h3>
            </div>
            <form action="{{ route('admin.cursos.update', $cursos->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $cursos->nombre }}" placeholder="Ingrese nombre">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        {{-- <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingrese apellido"> --}}
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control">{{ $cursos->descripcion }}</textarea>
                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aforo">Aforo</label>
                        <input type="text" class="form-control" name="aforo" id="aforo"
                            value="{{ $cursos->aforo }}" placeholder="Ingrese aforo del curso">
                        @error('aforo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" id="fechaInicio"
                            value="{{ $cursos->fechaInicio }}" placeholder="Ingrese Fecha Inicio">
                        @error('fechaInicio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Estudios</label>
                        <input type="date" class="form-control" name="fechaFin" id="fechaFin"
                            value="{{ $cursos->fechaFin }}" placeholder="Ingrese Fin">
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
                                <option value="{{ $profesor->id }}"
                                    {{ $cursos->id_profe == $profesor->id ? 'selected' : '' }}>{{ $profesor->nombre }}
                                </option>
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
                            class="fas mr-2 fa-save"></i>Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop
