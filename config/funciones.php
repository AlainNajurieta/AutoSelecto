<?php 
//Funcion de Saneo
function sanearDato($dato) {
    return trim(htmlspecialchars($dato));
}
//Funcion de validación
function validar($dato, $tipo) {
    $dato = sanearDato($dato);
    if ($tipo === "texto") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (is_numeric($dato)) return "Los números no son válidos.";
    } elseif ($tipo === "fecha") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!is_numeric($dato) || $dato < 3 || $dato > 120) return "La edad no es válida.";
    } elseif ($tipo === "passwd") {
        if (empty($dato)) return "Este campo es obligatorio.";
    } elseif ($tipo === "seleccion") {
        if (empty($dato)) return "Debe seleccionar al menos uno.";
    } elseif ($tipo === "correo") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!filter_var($dato, FILTER_VALIDATE_EMAIL)) return "El correo no es válido.";
    } elseif ($tipo == "telefono") {
        $telefonoLimpio = str_replace([' ', '-', '(', ')'], '', $dato);
        if (strlen($telefonoLimpio) === 9 && is_numeric($telefonoLimpio)){
            return "";
        }else{
            return "El número de teléfono no es válido";
        }
    } elseif ($tipo === "precio") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!is_numeric($dato) || $dato < 0) return "El precio debe ser un número positivo.";
    } elseif ($tipo === "kilometros") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!is_numeric($dato) || $dato < 0) return "Los kilómetros deben ser un número positivo.";
    } elseif ($tipo === "matricula") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!preg_match('/^[A-Z0-9-]{5,10}$/', $dato)) return "La matrícula no es válida.";
    } elseif ($tipo === "bastidor") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (strlen($dato) !== 17) return "El número de bastidor debe tener 17 caracteres.";
    } elseif ($tipo === "anioVehiculo") {
        if (empty($dato)) return "Este campo es obligatorio.";
        $anioActual = date("Y");
        if (!is_numeric($dato) || $dato < 1900 || $dato > $anioActual) 
            return "El año debe estar entre 1900 y $anioActual.";
    } else {
        exit();
    }
} 

// Funcion usuario

function obtener_usuario_por_id($conexion, $id) {
    $sql = "SELECT usuario FROM clientes WHERE ID = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
        if ($usuario) {
            return $usuario['usuario'];
        }
    }
    return null;
}

// Función todos los coches

function obtenerCoches($conexion) {
    $sql = "SELECT * FROM coches";
    $resul = mysqli_query($conexion, $sql);

    if (!$resul) {
        $error = "Error en consulta - " . mysqli_error($conexion);
        include "error404.php";
        exit();
    }

    $coches = [];
    while ($fila = mysqli_fetch_assoc($resul)) { 
        $coches[] = $fila;
    }

    return $coches;
}

// Función detallesCoche 
function obtenerDetallesCoche($conexion, $id) {
    
    $sql = "SELECT * FROM coches WHERE id = $id";
    $resul = mysqli_query($conexion, $sql);

    if (!$resul) {
        $error = "Error en consulta - " . mysqli_error($conexion);
        include "error404.php";
        exit();
    }

    $detallescoches = [];
    while ($fila = mysqli_fetch_assoc($resul)) { 
        $detallescoches[] = $fila;
    }

    return $detallescoches;
}

// Modificar precio
function actualizarPrecioCoche($conexion, $nuevo_precio, $id) {

    $sql = "UPDATE coches SET Precio = $nuevo_precio WHERE ID = $id";

    $resul = mysqli_query($conexion, $sql);

    if (!$resul) {
        $error = "Error en consulta - " . mysqli_error($conexion);
        include "error.php"; 
        exit(); 
    }

    return $resul;
}

function EliminarCoche($conexion,$id) {
    $sql="DELETE FROM Coches WHERE ID=".$_GET['eliminar'];

    $resul = mysqli_query($conexion, $sql);
    if (!$resul) 
    {
        $error = "Error en consulta - ".mysqli_error($conexion);
        include "error.php";
        exit();
    }
    return $resul;
}

function insertarCoche($conexion, $matricula, $ano_fabricacion, $marca_vehiculo, $color_vehiculo, $precio_vehiculo, $km_vehiculo, $numero_chasis, $imagen_vehiculo, $tipo_vehiculo, $id_cliente = 1) {
    $sql = "insert into coches (matricula, año, marca, color, precio, kilometros, numero_bastidor, imagen, tipovehiculo, id_cliente) 
            values ('$matricula', '$ano_fabricacion', '$marca_vehiculo', '$color_vehiculo', $precio_vehiculo, $km_vehiculo, '$numero_chasis', '$imagen_vehiculo', '$tipo_vehiculo', $id_cliente)";

    $resul = mysqli_query($conexion, $sql);

    if (!$resul) {
        $error = "Error en consulta - " . mysqli_error($conexion);
        include "error.php";
        exit();
    }

    return $resul;
}

?>