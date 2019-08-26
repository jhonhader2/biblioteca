@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Sistema de Préstamos de Libros</h1>
        <a class="btn btn-outline-primary" href="{{ route('prestamos.create') }}">Generar Préstamo</a>
        <hr>
        <table class="table table-hover table-sm">
            <thead class="text-center">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Libro</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha de Préstamo</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <th scope="row">{{ $prestamo->id }}</th>
                        <td>{{ $prestamo->libro->name }}</td>
                        <td>{{ $prestamo->user->name }}</td>
                        <td>{{ $prestamo->fecha_prestamo  }}</td>
                        <td>{{ $prestamo->fecha_entrega  }}</td>
                        <td>{{ $prestamo->libro->estado->name }}</td>
                        <td class="row justify-content-between">
                            <a class="btn btn-outline-warning btn-sm" href="{{ route('prestamos.edit', $prestamo->id) }} ">Editar</a>
                            {{-- <a class="btn btn-outline-danger btn-sm" href="{{ route('prestamos.destroy', $prestamo->id) }}">Eliminar</a> --}}
                            {{ Form::open([
                                    'action' => ['PrestamoController@destroy', $prestamo->id],
                                    'method' => 'POST'
                                ]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Borrar', ['class' => 'btn btn-outline-danger btn-sm']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection