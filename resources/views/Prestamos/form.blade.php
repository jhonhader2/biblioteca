<div class="form-group">
    <label for="libro_id">Nombre del Libro</label>
    {{ Form::select('libro_id', $libros, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="user_id">Usuario</label>
    {{ Form::select('user_id', $usuarios, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="fecha_prestamo">Fecha del Préstamo</label>
    <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo ?? '') }}">
</div>
<div class="form-group">
    <label for="fecha_entrega">Fecha de la Entrega</label>
    <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" value="{{ old('fecha_entrega', $prestamo->fecha_entrega ?? '') }}">
</div>
<div class="form-group">
    <label for="estado_id">Estado</label>
    {{ Form::select('estado_id', $estados, null, ['class' => 'form-control']) }}
</div>