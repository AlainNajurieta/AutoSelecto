<?php 
require_once "../config/funciones.php";
require_once "../config/database.php";
session_start();
// Bloque de redirección a vistas;
// queda hacer consulta para coger id y pasarlo por $session
// $_session['id']=id
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
    } elseif ($page === '.php') {
        include ' catalogo.php';
    } elseif ($page === 'noticias.php') {
        include 'noticias.php';
    } elseif ($page === 'coches.php') {
        include 'coches.php';
    } else {
        include 'error404.php';
    }
} else if(isset(($_POST["enviar"]))) {
    $errores = [];

    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";

    $erroresUsuario = validar($usuario, "texto");
    $erroresContraseña = validar($contrasena, "passwd");

    echo $erroresUsuario . $erroresContraseña;
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
            include "view_event.php";
            exit();
        }
        $usuario=array();
        $usuario = mysqli_fetch_assoc($resul);

        if($contrasena == $usuario['contraseña']){
            $id = $usuario['ID'];
            $_SESSION['id']=$id;
            include 'principal.php';
        }else{
            $errorContraseña = "Contraseña incorrecta";
            include 'inicioSesion.php';
        }

    } else {
        include 'inicioSesion.php';
    }
    
    // Si hay errores, mostrar inicioSesion.php, si no, continuar a principal.php
    
} else {
    include 'inicioSesion.php';
}

if(isset($_POST['registrar'])){
    $errores = [];

    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";

    $erroresUsuario = validar($usuario, "texto");
    $erroresContraseña = validar($contrasena, "passwd");
    $erroresCorreo= validar($correo, "correo");

    echo $erroresUsuario . $erroresContraseña;
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
    }else{
        include "registro.php";
    }
}









?>