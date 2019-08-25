@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Libros</h1>
        <a class="btn btn-outline-primary" href="{{ route('libros.create') }}">Crear Libro</a>
        <table class="table table-hover table-sm my-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Autor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <th scope="row">{{ $libro->id }}</th>
                        <td>{{ $libro->name  }}</td>
                        <td>{{ $libro->autor->name }}</td>
                        <td>{{ $libro->categoria->name }}</td>
                        <td>
                            <a class="btn btn-outline-warning btn-sm" href="libros.edit">Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="libros.destroy">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection