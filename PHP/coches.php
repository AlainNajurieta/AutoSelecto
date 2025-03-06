<?php 
    include "cabecera.php";
    include "../config/database.php";
?>
    <link rel="stylesheet" href="../CSS/coches.css">
<?php 
    include "navegador.php";
?> 
<body>
    <header>
        <h1>Vehículos</h1>
    </header>
    <main>
        <form method="get" action="coches.php">
            <div class="filter-bar">
                <button type="submit" class="filter-button <?php if (!isset($_GET['filter']) || $_GET['filter'] == 'todos') echo 'active'; ?>" name="filter" value="todos">Todos</button>
                <button type="submit" class="filter-button <?php if (isset($_GET['filter']) && $_GET['filter'] == 'coches') echo 'active'; ?>" name="filter" value="coches">Coches</button>
                <button type="submit" class="filter-button <?php if (isset($_GET['filter']) && $_GET['filter'] == 'motos') echo 'active'; ?>" name="filter" value="motos">Motos</button>
            </div>
        </form>
        <section class="services">
        <?php
            if(isset($_GET['filter'])){$filtro=$_GET['filter'];}else{$filtro="todos";}
            if(isset($filtro) && $filtro =="coches"){
                $sql = "SELECT * FROM coches WHERE tipoVehiculo='Coche'";
            }else if(isset($filtro) && $filtro == "motos"){
                $sql = "SELECT * FROM coches WHERE tipoVehiculo='Moto'";
            }else{
                $sql = "SELECT * FROM coches";
            }
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
            ?>
            <div class="service-card">
                    <img src="../imagenes/catalogo/<?php echo $coche['imagen'] ?>.jpg" alt="Imagen del vehículo">
                    <div class="card-content">
                        <h3><?php echo $coche['Marca']; ?></h3>
                        <p class="kilometers">Kilómetros: <?php echo number_format($coche['Kilometros'])." km"; ?></p>
                        <p class="price">Precio: <?php echo number_format($coche['Precio'], 2)."€"; ?></p>
                        <p class="year">Año: <?php echo $coche['Año']; ?></p>
                        <div class="button-group">
                            <a href="index.php?catalogo=si&detalles=<?php echo $coche['ID']; ?>" class="button info">MÁS INFORMACIÓN</a>
                            <a href="index.php?comprar=<?php echo $coche["ID"]; ?>" class="buy-button">COMPRAR</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        ?>




        </section>
    </main>

    <?php 
        include "pie.php";
    ?>
    </body>
</html>
