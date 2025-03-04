<?php 
require_once "../config/funciones.php";
require_once "../config/database.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['eliminar'])){
    EliminarCoche($conexion,$_GET['eliminar']);
}
if (isset($_GET['page'])) {
    $page = $_GET['page'] ?? '';
    if ($page === 'principal.php') {
        include 'principal.php';
    } elseif ($page === 'consejos_mecanicos.php') {
        include 'consejos_mecanicos.php';
    } elseif ($page === 'contacto.php') {
        include 'contacto.php';
    } elseif ($page === 'contenido_general.php') {
        include 'contenido_general.php';
    } elseif ($page === 'catalogo.php') {
        include 'error404.php';
    } elseif ($page === 'noticias.php') {
        include 'noticias.php';
    } elseif ($page === 'coches.php') {
        include 'coches.php';
    } elseif ($page === 'administrar.php') {
        include 'administrar.php';
    } elseif ($page === 'editar.php') {
        include 'editar.php';
    } elseif ($page === 'nuevo_vehiculo.php') {
        include 'nuevo_vehiculo.php';
    } else {
        include 'error404.php';
    }
} else if(isset(($_POST["enviar"]))) {
    $errores = [];

    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";

    $erroresUsuario = validar($usuario, "texto");
    $erroresContraseña = validar($contrasena, "passwd");

    
    // Agregar errores al array si existen
    if (!empty($erroresUsuario)) {
        $errores['usuario'] = $erroresUsuario;
    }
    if (!empty($erroresContraseña)) {
        $errores['contrasena'] = $erroresContraseña;
    }

    if(empty($errores)){
        $sql = "SELECT * FROM clientes WHERE usuario = '$usuario'";
        $resul = mysqli_query($conexion, $sql);
        if (!$resul) {
            $error = "Error en consulta - ".mysqli_error($conexion);
            include "error404.php";
            exit();
        }
        $usuario=array();
        $usuario = mysqli_fetch_assoc($resul);
        if(!empty($usuario['contraseña'])){
            if($contrasena == $usuario['contraseña']){
                $id = $usuario['ID'];
                $_SESSION['id']=$id;
                include 'principal.php';
            }else{
                $errorContraseña = "Contraseña incorrecta";
                include "inicio.php";
            }
        } else {
            $errorContraseña = "Contraseña incorrecta";
            include "inicio.php";
        }

    } else {
        include "inicio.php";
    }
    
    // Si hay errores, mostrar inicioSesion.php, si no, continuar a principal.php
    
} elseif(isset($_POST['registrar'])){
    $errores = [];

    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";

    $erroresUsuario = validar($usuario, "texto");
    $erroresContraseña = validar($contrasena, "passwd");
    $erroresCorreo= validar($correo, "correo");

    // Agregar errores al array si existen
    if (!empty($erroresUsuario)) {
        $errores['usuario'] = $erroresUsuario;
    }
    if (!empty($erroresContraseña)) {
        $errores['contrasena'] = $erroresContraseña;
    }
    if (!empty($erroresCorreo)) {
        $errores['correo'] = $erroresCorreo;
    }

    if(empty($errores)){
        $sql="insert into clientes (usuario, contraseña, correo) values ('$usuario', '$contrasena', '$correo')";
        $resul = mysqli_query($conexion, $sql);
        if (!$resul) {
            $error = "Error en consulta - ".mysqli_error($conexion);
            include "error404.php";
            exit();
        }
        include "inicio.php";
    }else{
        include "registro.php";
    }
} elseif(isset($_GET['detalles'])){
    
    $detallescoches = obtenerDetallesCoche($conexion, $_GET['detalles']);
    if(isset($_GET['catalogo'])){
        if($_GET['catalogo'] == "si"){
            $catalogo="si";
            include "detalles.php";
        } else {
            $catalogo="no";
            include "detalles.php";
        } 
    } else {
        include "editar.php";
    }
    
    
} else if(isset($_POST['contacto'])) {
    $errores = [];
    if(!empty($_POST['tratamiento'])){
        $tratamiento=$_POST['tratamiento'];
    }else{
        $tratamiento=NULL;
    }
    $nombre=$_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dia=$_POST["dia"];
    $mes=$_POST["mes"];
    $anio=$_POST["anio"];
    $fechaNacimiento = $anio."/".$mes."/".$dia;
    $id = $_POST['idUsuario'];

    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];
    
    $apellido=sanearDato($apellido);

    $errores['nombre']=validar($nombre,"texto");
    $errores['mensaje']=validar($mensaje,"texto");
    $errores['telefono']=validar($telefono, "telefono");

    if(empty(array_filter($errores))){
        $sql="insert into preguntas (Nombre, Telefono, Mensaje, Apellido, Fecha_nac, Tratamiento, id_cliente) values ('$nombre','$telefono','$mensaje','$apellido','$fechaNacimiento','$tratamiento','$id')";
        $resul = mysqli_query($conexion, $sql);
        unset($nombre, $apellido, $telefono, $mensaje, $dia, $mes, $anio, $tratamiento);
        if (!$resul) {
            $error = "Error en consulta - ".mysqli_error($conexion);
            include "error404.php";
            exit();
        }else{
            $correcto = "Se ha enviado correctamente";
            include "contacto.php";
        }
    }else{
        include "contacto.php";
    }
} elseif (isset($_POST['modificar_precio'])) {
    $errores = [];

    $precio = isset($_POST["nuevo_precio"]) ? trim($_POST["nuevo_precio"]) : "";

    if (empty($precio)) {
        $errores['precio'] = "Este campo es obligatorio";
    }

    if (empty($errores)) {
        actualizarPrecioCoche($conexion, $precio, $_POST['id']);
        $actualizacion = "El precio se ha actualizado";
    } 
    $detallescoches = obtenerDetallesCoche($conexion, $_POST['id']);

    include "editar.php";
    
} elseif (isset($_POST['agregar_vehiculo'])) {
    $errores = [];

    // Obtener los datos del formulario
    $ano_fabricacion = isset($_POST["ano_fabricacion"]) ? $_POST["ano_fabricacion"] : "";
    $marca_vehiculo = isset($_POST["marca_vehiculo"]) ? $_POST["marca_vehiculo"] : "";
    $color_vehiculo = isset($_POST["color_vehiculo"]) ? $_POST["color_vehiculo"] : "";
    $precio_vehiculo = isset($_POST["precio_vehiculo"]) ? $_POST["precio_vehiculo"] : "";
    $km_vehiculo = isset($_POST["km_vehiculo"]) ? $_POST["km_vehiculo"] : "";
    $numero_chasis = isset($_POST["numero_chasis"]) ? $_POST["numero_chasis"] : "";
    $imagen_vehiculo = isset($_POST["imagen_vehiculo"]) ? $_POST["imagen_vehiculo"] : "";
    $tipo_vehiculo = isset($_POST["tipo_vehiculo"]) ? $_POST["tipo_vehiculo"] : "";
    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "";

    // Validación de cada campo con la función 'validar'

    $errores['ano_fabricacion'] = validar($ano_fabricacion, "anioVehiculo");
    $errores['marca_vehiculo'] = validar($marca_vehiculo, "texto");
    $errores['color_vehiculo'] = validar($color_vehiculo, "texto");
    $errores['precio_vehiculo'] = validar($precio_vehiculo, "precio");
    $errores['km_vehiculo'] = validar($km_vehiculo, "kilometros");
    $errores['numero_chasis'] = validar($numero_chasis, "bastidor");
    $errores['imagen_vehiculo'] = validar($imagen_vehiculo, "texto");
    $errores['tipo_vehiculo'] = validar($tipo_vehiculo, "seleccion");
    $errores['matricula'] = validar($matricula, "matricula");

    $errores_filtrados = array_filter($errores); // Filtra los valores vacíos
    // Si no hay errores, proceder con el procesamiento (por ejemplo, guardar los datos)
    if (empty($errores_filtrados)) {
        $sql = "INSERT INTO Coches (Matricula, Año, Marca, Color, Precio, Kilometros, numero_bastidor, imagen, tipoVehiculo, id_Cliente) 
        VALUES ('$matricula', '$ano_fabricacion', '$marca_vehiculo', '$color_vehiculo', $precio_vehiculo, $km_vehiculo, '$numero_chasis', '$imagen_vehiculo', '$tipo_vehiculo', 1)";

        $resul = mysqli_query($conexion, $sql);

        if (!$resul) {
            $error = "Error en consulta - " . mysqli_error($conexion);
            include "error.php";
            exit();
        }
        include "administrar.php";
    } else {
        include "nuevo_vehiculo.php";
    }
    
} else {
    include "inicio.php";
}











?>