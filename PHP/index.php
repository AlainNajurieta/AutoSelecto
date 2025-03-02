<?php 
require_once "../config/funciones.php";
require_once "../config/database.php";
session_start();

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
        include ' catalogo.php';
    } elseif ($page === 'noticias.php') {
        include 'noticias.php';
    } elseif ($page === 'coches.php') {
        include 'coches.php';
    } elseif ($page === 'administrar.php') {
        include 'administrar.php';
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
    
    $sql="select * from coches where id = ".$_GET['detalles'];
    
    $resul = mysqli_query($conexion, $sql);
    if (!$resul) {
        $error = "Error en consulta - ".mysqli_error($conexion);
        include "error404.php";
        exit();
    }
    $detallescoches = array();
    while ($fila = mysqli_fetch_array($resul)){
        $detallescoches[] = $fila;
    }    
    if(isset($_GET['catalogo'])){
        if($_GET['catalogo'] == "si"){
            $catalogo="si";
        } else {
            $catalogo="no";
        }
    }
    include "detalles.php";
    
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
} else {
    include "inicio.php";
}











?>