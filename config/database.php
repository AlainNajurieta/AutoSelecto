<?php
// Configurar la conexión a la base de datos

    $bdconexion ="localhost";
    $username ="root";
    $password ="";

    $bd = "AutoSelecto";


// Manejar posibles errores de conexión
    try {
        $conexion = @mysqli_connect($bdconexion, $username, $password);

        $resul = mysqli_select_db($conexion, $bd);

    } catch (Throwable $th) {
        echo "Error en la conexion";
        include "error404.php";
        exit();
    }
?>
