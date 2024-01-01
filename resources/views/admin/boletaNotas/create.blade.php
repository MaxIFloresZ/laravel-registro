@extends('adminlte::page')

@section('title', 'Registrar Nota')

@section('content_header')
    <h1>Registrar Nota</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Nota a ingresar</h3>
            </div>
            <form action="{{ route('admin.boletanotas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="ano_estudio">Año de Estudio</label>
                        {{-- <input type="text" class="form-control" name="ano_estudio" id="ano_estudio"
                            placeholder="Ingrese nombre"> --}}
                            <select name="ano_estudio" id="ano" class="form-control"></select>

                        {{-- <select class="form-control" name="ano_estudio">
                            <script>
                                var d = new Date();
                                var n = d.getFullYear();
                                for (var i = n; i >= 1900; i--)
                                    document.write('<option value = "i">' + i + '</option>');
                            </script>
                        </select> --}}
                        @error('ano_estudio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nota_1">Nota 1</label>
                        <input type="text" class="form-control" name="Nota_1" id="Nota"
                            placeholder="Ingrese nombre">
                        @error('Nota_1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nota_2">Nota 2</label>
                        <input type="text" class="form-control" name="Nota_2" id="Nota_2"
                            placeholder="Ingrese nombre">
                        @error('Nota_2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nota_3">Nota 3</label>
                        <input type="text" class="form-control" name="Nota_3" id="Nota_3"
                            placeholder="Ingrese nombre">
                        @error('Nota_3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aforo">Curso</label>
                        <select name="id_Curso" id="id_Curso" class="form-control">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                            @endforeach
                        </select>
                        @error('aforo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_estudiante">Estudiante</label>
                        {{-- <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingrese apellido"> --}}
                        <select name="id_estudiante" id="id_estudiante" class="form-control">
                            @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                            @endforeach

                        </select>
                        @error('id_estudiante')
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


@section('js')
    <script>
        function ComboAno() {
            var n = (new Date()).getFullYear()
            var select = document.getElementById("ano");
            for (var i = n; i >= 1900; i--) select.options.add(new Option(i, i));
        };
        window.onload = ComboAno;

    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#btnGuardarEst').click(function() {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                );
            });

        })
    </script> --}}
@stop
