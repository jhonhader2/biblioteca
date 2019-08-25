@extends('layouts.app')
@section('content')
    <div class="row-6 my-2">
        <h3>Formulario para agregar Categorías</h3>
        {{ Form::open(['route' => 'categorias.store', 'method' => 'POST']) }}
            @include('categorias.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection