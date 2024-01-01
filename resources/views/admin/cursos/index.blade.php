@extends('adminlte::page')

@section('title', 'Profesores')

@section('content_header')
    <h1>Lista de Cursos</h1>
@stop

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            {{-- <div class="input-group-append"> --}}
                            <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-plus-circle mr-2"></i>Nuevo Curso</a>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Descripcion</th>
                                <th>Aforo</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Docente</th>
                                <th colspan="2" width="10%">Acciones</th>
                            </tr>
                        </thead>
                        @forelse ($cursos as $curso)
                            <tbody>
                                <tr>
                                    <td>{{ $curso->id }}</td>
                                    <td>{{ $curso->nombre }}</td>
                                    <td>{{ $curso->descripcion }}</td>
                                    <td>{{ $curso->aforo }}</td>
                                    <td>{{ $curso->fechaInicio }}</td>
                                    <td>{{ $curso->fechaFin }}</td>
                                    @foreach ($profesor as $profe)
                                        @if ($profe->id == $curso->id_profe)
                                            <td>{{ $profe->nombre }}</td>
                                        @endif
                                    @endforeach

                                    <td class="float-right ">
                                        <a href="{{ route('admin.cursos.edit', $curso->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas mr-2 fa-pencil-alt"></i>Editar</a>
                                        <form action="{{ route('admin.cursos.destroy', $curso->id) }}" method="post"
                                            class="d-inline deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas mr-2 fa-trash-alt"></i>Eliminar</button>

                                        </form>

                                    </td>

                                </tr>
                            </tbody>
                        @empty
                            Sin datos
                        @endforelse

                    </table>
                </div>

                <div class="card-footer">
                    {{ $cursos->links() }}
                </div>

            </div>

        </div>
    </div>

@stop


@section('js')
    <script>
        $('.deleteForm').submit(function(e) {
            e.preventDefault();
            // let nombreElemento =  e.target.parentElement.parentElement.children[1].innerText;
            // console.log(nombreElemento);
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Eliminado!",
                        text: "Su archivo ha sido eliminado.",
                        icon: "success"
                    });
                    this.submit(); //eliminamos
                }
            });
        });
    </script>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Bien!",
                text: "Estudiante creado correctamente!",
                icon: "success"
            });
        </script>
    @endif
    @if (Session::has('editado'))
        <script>
            Swal.fire({
                title: "Bien!",
                text: "Estudiante Acualizado correctamente!",
                icon: "success"
            });
        </script>
    @endif
@stop
