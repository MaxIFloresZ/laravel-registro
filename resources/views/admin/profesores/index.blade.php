@extends('adminlte::page')

@section('title', 'Profesores')

@section('content_header')
    <h1>Lista de Profesores</h1>
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
                            <a href="{{ route('admin.profesores.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-plus-circle mr-2"></i>Nuevo Profesor</a>
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
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Estudio</th>
                                <th colspan="2" width="10%">Acciones</th>
                            </tr>
                        </thead>
                        @forelse ($profesores as $profesor)
                            <tbody>
                                <tr>
                                    <td>{{ $profesor->id }}</td>
                                    <td>{{ $profesor->nombre }}</td>
                                    <td>{{ $profesor->apellido }}</td>
                                    <td>{{ $profesor->dni }}</td>
                                    <td>{{ $profesor->telefono }}</td>
                                    <td>{{ $profesor->estudios }}</td>
                                    <td class="float-right ">
                                        <a href="{{ route('admin.profesores.edit', $profesor->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas mr-2 fa-pencil-alt"></i>Editar</a>
                                        <form action="{{ route('admin.profesores.destroy', $profesor->id) }}"
                                            method="post" class="d-inline deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas mr-2 fa-trash-alt"></i>Eliminar</button>

                                        </form>

                                    </td>

                                </tr>
                            </tbody>
                        @empty
                            
                        @endforelse
                        
                    </table>
                </div>

                <div class="card-footer">
                    {{ $profesores->links() }}
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
                    this.submit();//eliminamos
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
