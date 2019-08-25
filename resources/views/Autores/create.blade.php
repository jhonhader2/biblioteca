@extends('layouts.app')

@section('content')
    <div class="row-6 my-2">
        <h3>Formulario para agregar autores</h3>
        {{ Form::open(['route' => 'autores.store', 'method' => 'POST']) }}
            @include('autores.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection