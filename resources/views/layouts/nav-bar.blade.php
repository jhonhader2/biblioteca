<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Biblioteca</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('libros.index') }}">Libros</a>
            <a class="nav-item nav-link" href="{{ route('autores.index') }}">Autores</a>
            <a class="nav-item nav-link" href="{{ route('categorias.index') }}">Categorias</a>
            <a class="nav-item nav-link" href="{{ route('estados.index') }}">Estados</a>
            <a class="nav-item nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
        </div>
    </div>
</nav>