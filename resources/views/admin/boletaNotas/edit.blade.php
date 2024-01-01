@extends('adminlte::page')

@section('title', 'Editar Profesor')

@section('content_header')
    <h1>Editar datos de la boleta <b>{{ $boletanotas->id }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Actualizar Boleta</h3>
            </div>
            <form action="{{ route('admin.boletanotas.update', $boletanotas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nota">Nota</label>
                        <input type="text" class="form-control" name="Nota" id="Nota" placeholder="Ingrese nombre"
                            value="{{ $boletanotas->Nota }}">
                        @error('Nota')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aforo">Curso</label>
                        <select name="id_Curso" id="id_Curso" class="form-control">
                            @foreach ($cursos as $curso)
                                <option
                                    value="{{ $curso->id }}" {{ $boletanotas->id_Curso == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->nombre }}</option>
                            @endforeach
                        </select>
                        @error('aforo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_estudiante">Estudiante</label>
                        <select name="id_estudiante" id="id_estudiante" class="form-control">
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" {{$boletanotas->id_estudiante == $estudiante->id ? 'selected' : ''}}>{{ $estudiante->nombre }}</option>
                            @endforeach

                        </select>
                        @error('id_estudiante')
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
