<?php

include_once('conexion.php');

$query = "SELECT id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS autor FROM personas WHERE estado = 1";
$autores = mysqli_query($con, $query) or die(mysqli_error($con));

$query = "SELECT l.id AS id, titulo, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS autor, l.disponible FROM libros AS l JOIN personas AS p ON l.id_autor = p.id WHERE l.estado = 1";
$libros = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <title>Biblioteca</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
                <a class="btn btn-sm btn-outline-primary" href="./personas"><i class="bi bi-people"></i> Personas</a>
                <h3>Ingrese los datos del libro...</h3>
                <form action="libros/guardar.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <select class="form-select" id="id_autor" name="id_autor" aria-label="selector de autores" required>
                            <option selected>Seleccione una Opcion...</option>
                            <?php foreach ($autores as $autor) : ?>
                                <option value="<?= $autor['id'] ?>"><?= $autor['autor']  ?></option>";
                            <?php endforeach ?>
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="disponible" class="form-label">Disponible</label>
                        <select class="form-select" id="disponible" name="disponible" aria-label="Selector de disponibilidad del libro" required>
                            <option selected>Seleccione una Opcion...</option>
                            <option value="1">Disponible</option>
                            <option value="0">No Disponible</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <input class="btn btn-sm btn-outline-primary" type="submit" value="Guardar">
                </form>
            </div>
            <div class="col">
                <h4 class="text-center">Libros Disponibles</h4>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr class="text-center">
                            <td>#</td>
                            <td>Libro</td>
                            <td>Autor</td>
                            <td>Disponibilidad</td>
                            <td colspan="2">Opciones</td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (mysqli_num_rows($libros) > 0) {
                            $pos        = 1;

                            while ($libro = mysqli_fetch_assoc($libros)) {
                        ?>
                                <tr>
                                    <td><?php echo $pos; ?></td>
                                    <td><?php echo $libro['titulo']; ?></td>
                                    <td><?php echo $libro['autor']; ?></td>
                                    <td><?php echo $libro['disponible'] ? 'SI' : 'NO'; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="libros/ver.php?id=<?php echo $libro['id']; ?>" class="btn btn-sm btn-outline-info">Ver</a>
                                            <a href="libros/editar.php?id=<?php echo $libro['id']; ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                            <a href="libros/eliminar.php?id=<?php echo $libro['id']; ?>" class="btn btn-sm btn-outline-danger" value="">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $pos++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="4">No hay datos</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>l