<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control">
</div>
<div class="form-group">
    <label for="categoria_id">Categoria</label>
    <select name="categoria_id" id="categoria_id" class="form-control">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="autor_id">Autor</label>
    <select name="autor_id" id="autor_id" class="form-control">
        @foreach ($autores as $autor)
            <Option value="{{ $autor->id }}">{{ $autor->name }}</Option>
        @endforeach
    </select>
</div>