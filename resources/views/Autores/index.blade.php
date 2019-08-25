@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Autores</h1>
        <a class="btn btn-outline-primary" href="{{ route('autores.create') }}">Crear Autor</a>
        <table class="table table-hover table-sm my-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                    <tr>
                        <th scope="row">{{ $autor->id }}</th>
                        <td>{{ $autor->name  }}</td>
                        <td>
                            <a class="btn btn-outline-warning btn-sm" href="autores.edit">Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="autores.destroy">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection