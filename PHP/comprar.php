<link rel="stylesheet" type='text/css' media='screen' href="../CSS/detalles.css">
<div class="detalles-container">
    <?php
        if(isset($_POST['comprar'])){
            echo "<p class='mensaje-compra'>Compra realizada con éxito </p>";
        }
        foreach($detallescoches as $detallecoche){
            if ($detallecoche['tipoVehiculo'] == "Coche"){
                $tipo = "el coche: ";
            }else if($detallecoche['tipoVehiculo'] == "Moto"){
                $tipo = " la moto: ";
            }
            echo "<h1 class='detalles-titulo'>Comprar ". $tipo . $detallecoche['Marca'] . "</h1>";

            echo "<div class='detalles-contenido'>";
                echo "<div class='detalles-info'>";
                    echo "<b>Año:</b> " . $detallecoche['Año'] . "<br><br>";
                    echo "<b>Color:</b> " . $detallecoche['Color'] . "<br><br>";
                    echo "<b>Kilómetros recorridos:</b> " . $detallecoche['Kilometros'] . " km<br><br>";
                    echo "<b>Precio:</b> $" . number_format($detallecoche['Precio'], 2) . "<br><br>";
                    echo "<b>Matrícula:</b> " . $detallecoche['Matricula'] . "<br><br>";
                    echo "<b>Número de bastidor:</b> " . $detallecoche['numero_bastidor'] . "<br><br>";
                echo "</div>"; 
                echo "<img src='../imagenes/catalogo/".$detallecoche['imagen'].".jpg' alt='Imagen del vehículo' class='detalles-imagen'>";
            echo "</div>";
        }
    ?>

    <div class="enlace-container">
        <a href='index.php?page=coches.php' class='detalles-link'>Volver al catálogo</a>
        <form method="post">
            <button type="submit" name="comprar" class="comprar-boton">Comprar</button>
        </form>
    </div>
</div>

