<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>AutoSelecto</title>
    <link rel="stylesheet" type='text/css' media='screen' href="CSS/logins.css">
</head>

<body>
    

    <div class="container">
        <form action="PHP/controlador.php" method="post">
            <h2>Iniciar sesión</h2>
            <div class="form">
                <input type="text" placeholder="Usuario" required>
            </div>
            <div class="form">
                <input type="password" placeholder="Contraseña" required>
            </div>
            <div class="form">
                <a href="PHP/registro.php">
                    <button type="button">Registrarse</button>
                </a>
            </div>
            <div class="form">
                <button type="submit" name="enviar">Siguiente</button>
            </div>
        </form>
    </div>

</body>
</html>
