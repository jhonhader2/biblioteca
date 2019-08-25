@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Usuarios</h1>
        <a class="btn btn-outline-primary" href="{{ route('usuarios.create') }}">Crear Usuario</a>
        <table class="table table-hover table-sm my-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->name  }}</td>
                        <td>{{ $usuario->email  }}</td>
                        <td>
                            <a class="btn btn-outline-warning btn-sm" href="usuarios.edit">Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="usuarios.destroy">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection