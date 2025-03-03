<link rel="stylesheet" type="text/css" media="screen" href="../CSS/editar.css">

<div class="html-block">
    <?php
        
        foreach ($detallescoches as $detallescoche) {
            echo "<h2>Modificar el precio del vehículo: " . htmlspecialchars($detallescoche["Marca"]) . " " . htmlspecialchars($detallescoche["tipoVehiculo"]) . "</h2>";
            echo "<p>Precio actual: $" . number_format($detallescoche['Precio'], 2) . "</p>";
    ?>
            <form action="index.php" method="post">
                    <label for="nuevo_precio">Nuevo precio</label>
                    <input type="number" name="nuevo_precio" id="nuevo_precio" step="0.01" >
                    <?php 
                        if (isset($errores['precio'])) { 
                            echo '<div class="error">' . $errores['precio'] . '</div>'; 
                        } 
                        if (isset($actualizacion)){
                            echo '<div class="actualizar">' . $actualizacion . '</div>'; 
                        }
                    ?>
                    <br>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($detallescoche['ID']); ?>">
                    <input type="submit" name="modificar_precio" value="Modificar"><br><br>
                </form>
                <a href="index.php?page=administrar.php">Volver</a>
    <?php
        }
        
    ?>
</div>
