@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('js')
    <script>
        Swal.fire({
            title: "Bienvenido!",
            text: "You clicked the button!",
            icon: "success"
        });
    </script>
@stop