<?php

include('includes/db.php');
if (isset($_GET['id']) == false) {
    echo "Es necesario enviar un id";
    die;
}
$id = $_GET['id'];
$sql = "select * from usuarios where id= $id";
$persona = DB::query($sql);
$persona = mysqli_fetch_object($persona);
if ($persona == false) {
    echo "El usuario no existe";
    die;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
            <h2>
                Editar Usuario
            </h2><br>
            <form action="index.php">
                <button type="submit" class="btn">Inicio</button>
            </form>
        <br>

        <div>
            <form action="guardar.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tr>
                        <input type="hidden" name="id" value="<?= $persona->id ?>">
                        <input type="hidden" name="accion" value="editar">
                        <td><input type="text" name="nombres"  value="<?= $persona->nombres ?>"></td>
                        <td><input type="text" name="apellidos" value="<?= $persona->apellidos ?>"></td>
                        <td><input type="text" name="email" value="<?= $persona->email ?>"></td>
                        <td><input type="password" name="password"></td>
                        <td>
                            <?php if ($persona->estado == "activo") {  ?>
                                <input type="radio" name="estado" value="activo" checked>Activo<br>
                                <input type="radio" name="estado" value="inactivo">Inactivo
                            <?php  } else {  ?>
                                <input type="radio" name="estado" value="activo">Activo<br>
                                <input type="radio" name="estado" value="inactivo" checked>Inactivo
                            <?php  }  ?>
                        </td>
                </table>
                <br>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>

</body>

</html>