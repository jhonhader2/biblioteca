@extends('layouts.app')
@section('content')
    <div class="row-6 my-2">
        <h3>Formulario para agregar Libros</h3>
        {{ Form::open(['route' => 'libros.store', 'method' => 'POST']) }}
            @include('libros.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection