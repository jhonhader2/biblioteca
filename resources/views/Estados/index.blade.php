@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Estados</h1>
    <a class='btn btn-outline-primary' href="{{ route('estados.create') }}">Crear Estado</a>
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estados as $estado)
                <tr>
                    <td scope="row">{{ $estado->id }}</td>
                    <td scope="row">{{ $estado->name }}</td>
                    <td scope="row">
                        <a class="btn btn-outline-warning btn-sm" href="estados.edit">Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="estados.destroy">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection