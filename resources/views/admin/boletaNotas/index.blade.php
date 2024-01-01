@extends('adminlte::page')

@section('title', 'Notas')

@section('content_header')
    <h1>Lista de Boleta Notas</h1>
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
                            <a href="{{ route('admin.boletanotas.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-plus-circle mr-2"></i>Agregar Nota</a>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres Estudiante</th>
                                <th>Curso</th>
                                <th>Año Estudio</th>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Promedio</th>
                                <th colspan="2" width="10%">Acciones</th>
                            </tr>
                        </thead>
                        @forelse ($boletaN as $boleta)
                            <tbody>
                                <tr>
                                    <td>{{ $boleta->id }}</td>
                                    @foreach ($estudiantes as $estudiante)
                                        @if ($boleta->id_estudiante == $estudiante->id)
                                            <td>{{ $estudiante->nombre }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($cursos as $curso)
                                        @if ($boleta->id_Curso == $curso->id)
                                            <td>{{ $curso->nombre }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $boleta->ano_estudio }}</td>
                                    <td>{{ $boleta->Nota_1 }}</td>
                                    <td>{{ $boleta->Nota_2 }}</td>
                                    <td>{{ $boleta->Nota_3 }}</td>
                                    <td> <span class="badge badge-primary px-2 py-2">{{ $boleta->notapromedio }}</span> </td>



                                    <td class="float-right ">
                                        <a href="{{ route('admin.boletanotas.edit', $boleta->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas mr-2 fa-pencil-alt"></i>Editar</a>
                                        <form action="{{ route('admin.boletanotas.destroy', $boleta->id) }}" method="post"
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
                            <div class="alert alert-danger" role="alert">
                                No hay datos
                            </div>
                        @endforelse

                    </table>
                </div>

                <div class="card-footer">
                    {{ $boletaN->links() }}
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
