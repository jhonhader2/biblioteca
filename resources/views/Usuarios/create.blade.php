@extends('layouts.app')
@section('content')
    <div class="col-6 my-2">
        <h3>Formulario para Crear Usuarios</h3>
        
        {{ Form::open(['route' => 'usuarios.store', 'method' => 'POST']) }}
            @include('usuarios.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection