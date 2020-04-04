<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
            <h2>
                Registrar Usuarios
            </h2><br>
            <form action="index.php">
                <button type="submit">Inicio</button>
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
                        </tr>
                    </thead>

                    <tbody class="center">
                        <tr>
                            <input type="hidden" value="guardar">
                            <td><input type="text" name="nombres"></td>
                            <td><input type="text" name="apellidos"></td>
                            <td><input type="text" name="email"></td>
                            <td><input type="password" name="password"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>

</body>

</html>