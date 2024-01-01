@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Lista de Estudiantes</h1>
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
                            <a href="{{ route('admin.estudiantes.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-plus-circle mr-2"></i>Nuevo Estudiante</a>
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
                                <th colspan="2" width="10%">Acciones</th>
                            </tr>
                        </thead>
                        @forelse ($estudiantes as $estudiante)
                            <tbody>
                                <tr>
                                    <td>{{ $estudiante->id }}</td>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->apellido }}</td>
                                    <td>{{ $estudiante->dni }}</td>
                                    <td>{{ $estudiante->telefono }}</td>
                                    <td class="float-right ">
                                        <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas mr-2 fa-pencil-alt"></i>Editar</a>
                                        <form action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}"
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
                        {{-- <tbody>
                            <tr>
                                <td>183</td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="tag tag-success">Approved</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>219</td>
                                <td>Alexander Pierce</td>
                                <td>11-7-2014</td>
                                <td><span class="tag tag-warning">Pending</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>657</td>
                                <td>Bob Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="tag tag-primary">Approved</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>175</td>
                                <td>Mike Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="tag tag-danger">Denied</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>

                <div class="card-footer">
                    {{ $estudiantes->links() }}
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
