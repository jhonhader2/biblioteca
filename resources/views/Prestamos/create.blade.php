@extends('layouts.app')
@section('content')
    <div class="row-6 my-2">
        <h3>Formulario para Prestamos</h3>      
        {{ Form::open(['route' => 'prestamos.store', 'method' => 'POST']) }}
            @include('prestamos.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection