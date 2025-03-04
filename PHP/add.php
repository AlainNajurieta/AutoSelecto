<form action="index.php" method="post">

    <label for="matricula">Matrícula:</label><br>
    <input type="text" id="matricula" name="matricula" value="<?php echo isset($_POST['matricula']) ? $_POST['matricula'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['matricula'])) echo $errores_anadir['matricula'];
    ?><br><br>
    </span>

    <label for="anio">Año:</label><br>
    <input type="number" id="anio" name="anio" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo isset($_POST['anio']) ? $_POST['anio'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['anio'])) echo $errores_anadir['anio'];
    ?><br><br>
    </span>

    <label for="marca">Marca:</label><br>
    <input type="text" id="marca" name="marca" value="<?php echo isset($_POST['marca']) ? $_POST['marca'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['marca'])) echo $errores_anadir['marca'];
    ?><br><br>
    </span>

    <label for="color">Color:</label><br>
    <input type="text" id="color" name="color" value="<?php echo isset($_POST['color']) ? $_POST['color'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['color'])) echo $errores_anadir['color'];
    ?><br><br>
    </span>

    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" step="0.01" value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['precio'])) echo $errores_anadir['precio'];
    ?><br><br>
    </span>

    <label for="kilometros">Kilómetros:</label><br>
    <input type="number" id="kilometros" name="kilometros" value="<?php echo isset($_POST['kilometros']) ? $_POST['kilometros'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['kilometros'])) echo $errores_anadir['kilometros'];
    ?><br><br>
    </span>

    <label for="numero_bastidor">Número de Bastidor:</label><br>
    <input type="text" id="numero_bastidor" name="numero_bastidor" value="<?php echo isset($_POST['numero_bastidor']) ? $_POST['numero_bastidor'] : ''; ?>"><br>
    <span>
    <?php
        if (isset($errores_anadir['numero_bastidor'])) echo $errores_anadir['numero_bastidor'];
    ?><br><br>
    </span>

    <label for="imagen">Imagen del vehículo:</label><br>
    <input type="text" id="imagen" name="imagen" value="<?php echo isset($_POST['imagen']) ? $_POST['imagen'] : ''; ?>"><br><br>

    <label for="tipoVehiculo">Tipo de vehículo:</label><br>
    <select id="tipoVehiculo" name="tipoVehiculo">
        <option value="Coche" <?php echo (isset($_POST['tipoVehiculo']) && $_POST['tipoVehiculo'] == 'Coche') ? 'selected' : ''; ?>>Coche</option>
        <option value="Moto" <?php echo (isset($_POST['tipoVehiculo']) && $_POST['tipoVehiculo'] == 'Moto') ? 'selected' : ''; ?>>Moto</option>
    </select><br><br>

    <input type="submit" name="añadir_vehiculo" value="Añadir Vehículo"><br><br>

</form>

<a href="index.php?page=administrar.php">Volver al panel</a>
