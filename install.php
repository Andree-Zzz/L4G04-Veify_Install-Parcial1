<?php
    if(isset($_POST['host'])){//si existe la variable HOST..
        //Escribir  en el archivo config y las variables de conexion
        $file=fopen("includes/config.php","w");//abre en archivo en modo Write(w)

        fwrite($file, "<?php" . PHP_EOL);
        fwrite($file, "define('HOST', '" . $_POST['host']."');" . PHP_EOL);
        fwrite($file, "define('USER', '" . $_POST['user']."');" . PHP_EOL);
        fwrite($file, "define('PASSWORD', '" . $_POST['password']."');" . PHP_EOL);
        fwrite($file, "define('DB', '" . $_POST['db']."');" . PHP_EOL);
        fwrite($file, "?>");

        fclose($file);
        echo "creando un archivo de conexion";

        //Importando Base de datos
        $sql=file_get_contents('includes/db.sql');
        include('includes/db.php');

        if(DB::getConnection()->multi_query($sql)){
            //Se ejecuto la importacion correctamente
            unlink('install.php');
            header('location: index.php');
        }else{
            echo "<br>No se ha podido importar la baase corectamente, verifique errore";
        }
        die;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Para el correcto funcionamiento del sistema llena la siguiente información:</h2><br>
    <form action="install.php" method="post">
        <div class="container">
            <div>
                <label for="host">Host</label>
                <input class="insta" type="text" name="host" >
            </div>
            <div>
                <label for="user">Usuario DB</label>
                <input class="insta" type="text" name="user" >
            </div>
            <div>
                <label for="password">Contrasña DB</label>
                <input class="insta" type="text" name="password">
            </div>
            <div>
                <label for="db">Base de datos</label>
                <input class="insta" type="text" name="db">
            </div>
            <button>Guardar</button>
        </div>
    </form>
</body>
</html>