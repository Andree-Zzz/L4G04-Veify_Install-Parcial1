<?php
    include("includes/verify_install.php");
    include('includes/db.php');
    $sql = "select * from usuarios";
    $result = DB::query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>
        Listado de Usuarios
    </h2>
    <div class="container">
        <form action="crear.php">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($mostrar = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?= $mostrar['id'] ?></td>
                                <td><?= $mostrar['nombres'] ?></td>
                                <td><?= $mostrar['apellidos'] ?></td>
                                <td><?= $mostrar['email'] ?></td>
                                <td class="<?= $mostrar['estado'] ?>"><?= $mostrar['estado'] ?></td>
                                <input type="hidden" name="estado" value="<?= $mostrar['estado'] ?>">
                                <td>
                                    <?php if ($mostrar['estado'] == "activo") {  ?>
                                        <a href="guardar.php?estado=<?= $mostrar['estado'] ?>&id=<?= $mostrar['id'] ?>">Inactivar</a>
                                    <?php  } else {  ?>
                                        <a href="guardar.php?estado=<?= $mostrar['estado'] ?>&id=<?= $mostrar['id'] ?>">Activar</a>
                                    <?php  }  ?>
                                    <a href="editar.php?id=<?= $mostrar['id'] ?>">Editar</a>
                                    <a href="eliminar.php?id=<?= $mostrar['id'] ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <button type="submit">Nuevo Usuario</button>
        </form>
    </div>

</body>
</html>