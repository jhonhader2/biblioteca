<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control">
</div>
<div class="form-group">
    <label for="categoria_id">Categoria</label>
    {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="autor_id">Autor</label>
    {{ Form::select('autor_id', $autores, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="estado_id">Estado</label>
    {{ Form::select('estado_id', $estados, null, ['class' => 'form-control']) }}
</div>