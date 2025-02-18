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
    } elseif ($tipo === "fecha") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!is_numeric($dato) || $dato < 3 || $dato > 120) return "La edad no es válida.";
    } elseif ($tipo === "passwd") {
        if (empty($dato)) return "Este campo es obligatorio.";
    } elseif ($tipo === "seleccion") {
        if (empty($dato)) return "Debe seleccionar al menos uno.";
    } else {
        exit();
    }
}
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
    } elseif ($page === 'ofertas_destacadas_ambas.php') {
        include 'ofertas_destacadas_ambas.php';
    } elseif ($page === 'ofertas_destacadas_coches.php') {
        include 'ofertas_destacadas_coches.php';
    } elseif ($page === 'ofertas_destacadas_motos.php') {
        include 'ofertas_destacadas_motos.php';
    } else {
        include 'error.php';
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

    if(isset($errores)){
        include 'inicioSesion.php';
    } else {
        include 'php/principal.php';
    }
    
    // Si hay errores, mostrar inicioSesion.php, si no, continuar a principal.php
    
} else {
    include 'inicioSesion.php';
}









?>