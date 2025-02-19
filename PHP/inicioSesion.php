<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body class="inicio">

    <div class="container">
        <form action="index.php" method="post">
            <h2>Iniciar Sesión</h2>

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena">

            <div class="buttons">
                <button type="button" onclick="location.href='registro.php'">Registrarse</button>
                <input type="submit" name="enviar" value="Siguiente" id="enviar"/>
            </div>
        </form>
    </div>

</body>
</html>
