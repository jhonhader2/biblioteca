@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Categorias</h1>
        <a class="btn btn-outline-primary" href="{{ route('categorias.create') }}">Crear Categoria</a>
        <table class="table table-hover table-sm my-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->name  }}</td>
                        <td>
                            <a class="btn btn-outline-warning btn-sm" href="categorias.edit">Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="categorias.destroy">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection