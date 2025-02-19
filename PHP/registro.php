<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body class="registro">

    <div class="container">
        <form action="index.php" method="post">
            <h2>Registrarse</h2>

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena">

            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" id="correo">

            <div class="buttons">
                <button type="button" onclick="location.href='inicioSesion.php'">Iniciar sesión</button>
                <input type="submit" name="registrar" value="Siguiente" id="registrar"/>
            </div>
        </form>
    </div>

</body>
</html>
