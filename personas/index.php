<?php

include_once('../conexion.php');

$query = "SELECT p.id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS nombre_completo, r.nombre AS rol, p.estado FROM personas AS p JOIN roles AS r ON r.id = p.id_rol WHERE p.estado = 1";
$personas = mysqli_query($con, $query) or die(mysqli_error($con));


$query = "SELECT id, nombre FROM roles WHERE estado = 1";
$roles = mysqli_query($con, $query) or die(mysqli_error($con));

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
                <a class="btn btn-sm btn-outline-primary" href="../index.php"><i class="bi bi-home"></i> Inicio</a>
                <h3>Ingrese los datos...</h3>
                <form action="guardar.php" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                    </div>
                    <div class="mb-3">
                        <label for="primer_apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="mail" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="id_rol" name="id_rol" aria-label="selector de roles" required>
                            <option selected>Seleccione una Opcion...</option>
                            <?php foreach ($roles as $rol) : ?>
                                <option value="<?= $rol['id'] ?>"><?= $rol['nombre']  ?></option>";
                            <?php endforeach ?>
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" placeholder="Ingrese su bio" name="biografia" id="biografia" style="height: 100px"></textarea>
                        <label for="biografia">Biografía</label>
                    </div>
                    <input class="btn btn-sm btn-outline-primary" type="submit" value="Guardar">
                </form>
            </div>
            <div class="col">
                <h4 class="text-center">Personas</h4>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr class="text-center">
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Rol</td>
                            <td>Estado</td>
                            <td colspan="2">Opciones</td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (mysqli_num_rows($personas) > 0) {
                            $pos = 1;

                            while ($persona = mysqli_fetch_assoc($personas)) {
                        ?>
                                <tr>
                                    <td><?php echo $pos; ?></td>
                                    <td><?php echo $persona['nombre_completo']; ?></td>
                                    <td><?php echo $persona['rol']; ?></td>
                                    <td><?php echo $persona['estado'] ? 'ACTIVO' : 'INACTIVO'; ?></td>
                                    <td><a href="editar.php?id=<?php echo $persona['id']; ?>" class="btn btn-sm btn-outline-warning">Editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $persona['id']; ?>" class="btn btn-sm btn-outline-danger" value="">Eliminar</a></td>
                                </tr>
                            <?php $pos++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="6">No hay datos</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>l