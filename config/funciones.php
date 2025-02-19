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
    } elseif ($tipo === "correo") {
        if (empty($dato)) return "Este campo es obligatorio.";
        if (!filter_var($dato, FILTER_VALIDATE_EMAIL)) return "El correo no es válido.";
    } else {
        exit();
    }
} 

function telefono($telefono){
    $telefonoLimpio = str_replace([' ', '-', '(', ')'], '', $telefono);
    if (strlen($telefonoLimpio) === 9 && is_numeric($telefonoLimpio)){
        exit;
    }else{
        return "El número de teléfono no es válido";
    }
}
?>