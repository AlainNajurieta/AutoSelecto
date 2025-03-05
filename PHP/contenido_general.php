<?php
    include "cabecera.php";
?>
<link rel="stylesheet" type='text/css' media='screen' href="../CSS/contenidos_generales.css">
<?php
    include "navegador.php";
?>
  
  <div class="contenedor">
    <h1 class="titulo-principal">Contenido general</h1>
    <h2 class="subtitulo">Descubre todo un mundo e infórmate sobre el motor</h2>        
    
    <a href="index.php?page=consejos_mecanicos.php">
        <div class="card card-mecanica">            
            <div class="descripcion-card">
                <p>Todos los consejos acerca de mecánica sobre tu vehículo </p>   
            </div>       
        </div>
    </a>

    <a href="index.php?page=noticias.php">
        <div class="card card-noticias">                           
            <div class="descripcion-card">
                <p>
                    Las noticias más recientes 
                    <br>
                    Nuevos coches, motos, precios... 
                </p>               
            </div>
        </div>
    </a>

    
    <a href="index.php?page=coches.php">
        <div class="card card-preguntas">                 
            <div class="descripcion-card">
                <p>
                    Encuentra tu coche ideal
                    <br>
                    con nosotros
                </p>
            </div>
        </div>
    </a>

</div>



<?php
    include "pie.php";
?>