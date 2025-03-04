<link rel="stylesheet" type="text/css" media="screen" href="../CSS/nuevo_vehiculo.css">

<div class="form-container">
    <h1>Nuevo Vehículo</h1><br>
    <form action="index.php" method="post">
    <label for="marca_vehiculo">Matrícula del Vehículo:</label>
        <input type="text" id="matricula" name="matricula" value="<?php echo isset($_POST['matricula']) ? $_POST['matricula'] : ''; ?>">
        <span><?php if (isset($errores['matricula'])) echo $errores['matricula']; ?></span><br><br>

        <label for="ano_fabricacion">Año de Fabricación:</label>
        <input type="number" id="ano_fabricacion" name="ano_fabricacion" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo isset($_POST['ano_fabricacion']) ? $_POST['ano_fabricacion'] : ''; ?>">
        <span><?php if (isset($errores['ano_fabricacion'])) echo $errores['ano_fabricacion']; ?></span><br><br>

        <label for="marca_vehiculo">Marca del Vehículo:</label>
        <input type="text" id="marca_vehiculo" name="marca_vehiculo" value="<?php echo isset($_POST['marca_vehiculo']) ? $_POST['marca_vehiculo'] : ''; ?>">
        <span><?php if (isset($errores['marca_vehiculo'])) echo $errores['marca_vehiculo']; ?></span><br><br>

        <label for="color_vehiculo">Color del Vehículo:</label>
        <input type="text" id="color_vehiculo" name="color_vehiculo" value="<?php echo isset($_POST['color_vehiculo']) ? $_POST['color_vehiculo'] : ''; ?>">
        <span><?php if (isset($errores['color_vehiculo'])) echo $errores['color_vehiculo']; ?></span><br><br>

        <label for="precio_vehiculo">Precio del Vehículo:</label>
        <input type="number" id="precio_vehiculo" name="precio_vehiculo" step="0.01" value="<?php echo isset($_POST['precio_vehiculo']) ? $_POST['precio_vehiculo'] : ''; ?>">
        <span><?php if (isset($errores['precio_vehiculo'])) echo $errores['precio_vehiculo']; ?></span><br><br>

        <label for="km_vehiculo">Kilómetros del Vehículo:</label>
        <input type="number" id="km_vehiculo" name="km_vehiculo" value="<?php echo isset($_POST['km_vehiculo']) ? $_POST['km_vehiculo'] : ''; ?>">
        <span><?php if (isset($errores['km_vehiculo'])) echo $errores['km_vehiculo']; ?></span><br><br>
        <label for="numero_chasis">Número de Chasis:</label>
        <input type="text" id="numero_chasis" name="numero_chasis" value="<?php echo isset($_POST['numero_chasis']) ? $_POST['numero_chasis'] : ''; ?>">
        <span><?php if (isset($errores['numero_chasis'])) echo $errores['numero_chasis']; ?></span><br><br>

        <label for="imagen_vehiculo">Imagen del Vehículo:</label>
        <input type="text" id="imagen_vehiculo" name="imagen_vehiculo" value="<?php echo isset($_POST['imagen_vehiculo']) ? $_POST['imagen_vehiculo'] : ''; ?>">
        <span><?php if (isset($errores['imagen_vehiculo'])) echo $errores['imagen_vehiculo']; ?></span><br><br>

        <label for="tipo_vehiculo">Tipo de Vehículo:</label>
        <select id="tipo_vehiculo" name="tipo_vehiculo">
            <option value="Coche" <?php echo (isset($_POST['tipo_vehiculo']) && $_POST['tipo_vehiculo'] == 'Coche') ? 'selected' : ''; ?>>Coche</option>
            <option value="Moto" <?php echo (isset($_POST['tipo_vehiculo']) && $_POST['tipo_vehiculo'] == 'Moto') ? 'selected' : ''; ?>>Moto</option>
        </select>

        <input type="submit" name="agregar_vehiculo" value="Agregar Vehículo" class="btn">
    </form>

    <a href="index.php?page=administrar.php" class="back-link">Volver al panel</a>
</div>
