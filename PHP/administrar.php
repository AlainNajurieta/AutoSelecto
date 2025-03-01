<?php
    include "cabecera.php";
?>
<link rel="stylesheet" type='text/css' media='screen' href="../CSS/administrar.css">
<?php
    include "navegador.php";
?>
<div class="container">
    <h2>Panel Administrativo - Gestión de Coches</h2>
    <a href="index.php?page=anadir" class="add-car">Agregar Nuevo Coche</a>
    
    <table class="car-table" border=1>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
            <th>Kilómetros</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
            $sql = "SELECT * FROM coches";
        
            $resul = mysqli_query($conexion, $sql);
            if (!$resul) {
                $error = "Error en consulta - ".mysqli_error($conexion);
                include "error404.php";
                exit();
            }
            $coches = array();
            while ($fila = mysqli_fetch_array($resul)){
                $coches[] = $fila;
            }
            foreach($coches as $coche){
                $id = $coche['ID'];
                echo "<tr>";
                echo "<td>" . $coche['ID'] . "</td>";
                echo "<td>" . $coche['Marca'] . "</td>";
                echo "<td>" . $coche['tipoVehiculo'] . "</td>";
                echo "<td>" . $coche['Año'] . "</td>";
                echo "<td>" . $coche['Color'] . "</td>";
                echo "<td>" . $coche['Kilometros'] . "</td>";
                echo "<td>" . $coche['Precio'] . "</td>";
                echo "<td><a href='index.php?id=$id&editar=editar'>Editar</a> | ";
                echo "<a href='index.php?page=admin&eliminar=$id'>Eliminar</a> | ";
                echo "<a href='index.php?detalles=$id'>Ver Detalles</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
<?php
    include "pie.php";
?>