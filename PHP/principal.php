    <?php 
        include "cabecera.php";
    ?>
    <link rel="stylesheet" type='text/css' media='screen' href="../CSS/indice.css">
    <?php 
        include "navegador.php";
    ?>
    <main>
        <div class="seccion1">
            <div class="foto">
                <img src="../imagenes/portada.jpg" alt="bmw portada" />
                <h2>Autoselecto</h2>
            </div>
        </div>
        <div class="contenedor-combinado">
        <div class="texto-intermedio">
            <h3>Mantente al Día con nosotros</h3>
            <p>Explora las últimas novedades del mundo automotor, desde análisis detallados hasta consejos prácticos de mecánica. Encuentra todo lo que necesitas para mantener tu coche a punto y tomar decisiones informadas.</p>
        </div>

        <div class="seccion2">
            <div class="item">
                <a href="index.php?page=contenido_general.php"><img src="../imagenes/contenidos.jpg" alt="imagen contenidos generales">
                <p>Contenidos generales</p></a>
            </div>
            <div class="item">
                <a href="index.php?page=noticias.php"><img src="../imagenes/ultimas.jpg" alt="Imagen últimas noticias">
                <p>Últimas noticias</p></a>
            </div>
            <div class="item">
                <a href="index.php?page=consejos_mecanicos.php"><img src="../imagenes/seguro_vida.jpg" alt="imagen consejos mecánicos">
                <p>Consejos mecánicos</p></a>
            </div>
        </div>

        <div class="seccion3">
            <a href="index.php?page=coches.php">
                <div class="imagen-texto">
                    <img src="../imagenes/ofertas_coches_septiembre.jpg" alt="imagen ofertas">
                    <p>Ofertas destacadas</p>
                </div>
            </a>
        </div>
    </div>
</main>

    <?php 
    include "pie.php";
    ?>
</body>
</html>
    
