@extends('layouts.app')
@section('content')
    <div class="row-6 my-2">
        <h3>Formulario para Estados</h3>
        {{ Form::open(['route' => 'estados.store','method' => 'POST']) }}
            @include('estados.form')
            @include('layouts.commons.btns.grabar')
        {{ Form::close() }}
    </div>
@endsection