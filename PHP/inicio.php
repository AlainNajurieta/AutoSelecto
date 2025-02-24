<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' media='screen' href="../CSS/inicio.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="form-container">
        <form action="index.php" method="post">
            <h2>Iniciar Sesión</h2>

            <!-- Usuario -->
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            <?php 
                if (isset($errores['usuario'])) { 
                    echo '<div class="error">' . $errores['usuario'] . '</div>'; 
                } 
            ?>

            <!-- Contraseña -->
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena">
            <?php 
                if (isset($errores['contrasena'])) { 
                    echo '<div class="error">' . $errores['contrasena'] . '</div>'; 
                }
                if (isset($errorContraseña)) { 
                    echo '<div class="error">' . $errorContraseña . '</div>'; 
                }
            ?>

            <!-- Botones -->
            <button type="button" class="btn" onclick="location.href='registro.php'">Registrarse</button>
            <input type="submit" name="enviar" value="Siguiente" class="btn"/>
        </form>
    </div>
</body>
</html>
