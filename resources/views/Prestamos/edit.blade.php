@extends('layouts.app')

@section('content')
    <div class="row-6 my-2">
        <h3>Editar Prestamo:</h3>
        {{ Form::model($prestamo, ['route' => ['prestamos.update', $prestamo->id], 'method' => 'PUT']) }}
            @include('prestamos.form')
            @include('layouts.commons.btns.editar')
        {{ Form::close() }}
    </div>
@endsection