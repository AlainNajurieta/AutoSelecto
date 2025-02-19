<?php 
require_once "../config/funciones.php";
// Bloque de redirección a vistas;
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
        include 'principal.php';
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
    $correo = isset($_POST["correo"]) ? trim($_POST["uscorreouario"]) : "";

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

    }
}









?>