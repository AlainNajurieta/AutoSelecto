<?php 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
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
        include 'error.php'; // Página para manejar casos no válidos
    }
} else {
    include 'inicioSesion.php'; // Página predeterminada
}









//if(isset($_POST["enviar"])){
//    include "index.php";
//}
?>