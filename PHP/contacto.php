<?php 
    include "cabecera.php";
    require_once "../config/funciones.php";
    require_once "../config/database.php";
    session_start();
    $id = $_SESSION['id'];
?>
        <link rel="stylesheet" type="text/css" media="screen" href="../CSS/contactos.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
<?php 
    include "navegador.php";

    // validar formulario
    if(isset(($_POST["contacto"]))) {
        $errores = [];
        if(!empty($_POST['tratamiento'])){
            $tratamiento=$_POST['tratamiento'];
        }
        $nombre=$_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechaNacimiento=$_POST['fecha'];
        $telefono = $_POST["telefono"];
        $mensaje = $_POST["mensaje"];
        
        $apelldio=sanearDato($apellido);

        $errores['nombre']=validar($nombre,"texto");
        $errores['mensaje']=validar($mensaje,"texto");
        $errores['telefono']=telefono($telefono);

        if(empty(array_filter($errores))){
            $sql="insert into preguntas (Nombre, Telefono, Mensaje, Fecha_Nac, Tratamiento, id_cliente) values ('$nombre','$telefono','$mensaje','$apellido','$fechaNacimiento','$tratamiento','$id')";
            $resul = mysqli_query($conexion, $sql);
            if (!$resul) {
                $error = "Error en consulta - ".mysqli_error($conexion);
                exit();
            }else{
                $_GET['page']='contacto.php';
            }
        }else{
            $_GET['page']= "contacto.php";
        }
    }

?>



    <body>
        <div class="header"></div>
        <div class="cuerpo">
            <div class="formulario">
                <form action="contacto.php" method="post">
                    <h1>Contáctanos</h1>
                    <input type="hidden" name="idUsuario">
                    <div class="campo">
                        <label>Tratamiento</label>
                        <div class="tratamiento">
                            <div class="radio-item">
                                <input type="radio" id="sr" name="tratamiento" value="señor">
                                <label for="sr">Sr</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="sra" name="tratamiento" value="señora">
                                <label for="sra">Sra</label>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <label for="nombre">Nombre <span>*</span></label>
                        <input type="text" id="nombre" name="nombre"  />
                    </div>
                    <div class="campo">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" />
                    </div>
                    <div class="campo">
                        <label for="fecha">Fecha de nacimiento</label>
                        <input type="date" id="fecha" name="fecha">
                    </div>
                    <div class="campo">
                        <label for="telefono">Teléfono <span>*</span></label>
                        <input type="text" id="telefono" name="telefono"/>
                    </div>

                    <div class="campo">
                        <label for="mensaje">Mensaje <span>*</span></label>
                        <textarea id="mensaje" name="mensaje" ></textarea>
                    </div>
                    <button type="submit" name="contacto">Enviar</button>
                </form>
            </div>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2926.8958122078243!2d-1.6602112723320361!3d42.811687696551125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd50925f95549799%3A0x353461861374ba74!2sAv.%20de%20P%C3%ADo%20XII%2C%209%2C%2031007%20Pamplona%2C%20Navarra!5e0!3m2!1ses!2ses!4v1708970283178!5m2!1ses!2ses" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="descripcion">
                    <p><i class="fa-solid fa-location-dot"></i> <b>Ubicación:</b> Av. Pío XII, 9, Pamplona</p>
                    <p><i class="fa-solid fa-phone"></i> <b>Télefono:</b> (+34) 987393565</p>
                </div>
            </div>


            <div class="accordion" id="accordionExample">
            <h1>Preguntas frecuentes</h1>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">¿Cuáles son los factores más importantes a considerar al comprar un coche nuevo?</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Al comprar un coche nuevo, es importante considerar varios factores clave. Primero, determina tu presupuesto y las opciones de financiación disponibles. Luego, evalúa tus necesidades en términos de tamaño, tipo de carrocería y capacidad de carga. Considera el consumo de combustible y las emisiones, especialmente si vives en una zona con restricciones ambientales. La seguridad es crucial, así que revisa las calificaciones de seguridad y las características de asistencia al conductor. Investiga la fiabilidad y los costos de mantenimiento de las marcas y modelos que te interesan. Por último, no olvides probar el coche antes de comprarlo para asegurarte de que te sientes cómodo al conducirlo.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">¿Cuáles son los consejos mecánicos básicos que todo conductor debería conocer?</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Todo conductor debería conocer algunos consejos mecánicos básicos para mantener su vehículo en buen estado. Es fundamental revisar regularmente los niveles de aceite, líquido refrigerante y líquido de frenos. Mantén la presión adecuada en los neumáticos y verifica su desgaste periódicamente. Cambia el aceite y los filtros según las recomendaciones del fabricante. Presta atención a ruidos o vibraciones inusuales y no los ignores. Mantén limpio el filtro de aire y reemplázalo cuando sea necesario. Revisa las luces y los limpiaparabrisas con regularidad. Por último, sigue el programa de mantenimiento recomendado por el fabricante para prevenir problemas mayores.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">¿Cuáles son las últimas tendencias en tecnología automotriz?</button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Las últimas tendencias en tecnología automotriz están transformando la industria. La electrificación es una de las más importantes, con un aumento en la producción de vehículos eléctricos e híbridos. Los sistemas de conducción autónoma están avanzando rápidamente, con más vehículos ofreciendo funciones de asistencia al conductor. La conectividad es otra tendencia clave, con coches que se integran cada vez más con smartphones y ofrecen servicios basados en la nube. La inteligencia artificial se está utilizando para mejorar la seguridad y la experiencia del usuario. Además, los fabricantes están explorando nuevos materiales ligeros y sostenibles para mejorar la eficiencia y reducir el impacto ambiental.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">¿Cómo puedo mejorar la eficiencia de combustible de mi coche?</button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Para mejorar la eficiencia de combustible de tu coche, puedes seguir varios consejos prácticos. Mantén una velocidad constante y evita aceleraciones y frenadas bruscas. Asegúrate de que los neumáticos estén correctamente inflados, ya que los neumáticos desinflados aumentan el consumo de combustible. Realiza un mantenimiento regular, incluyendo cambios de aceite y filtros. Reduce el peso innecesario en el vehículo y evita el uso excesivo del aire acondicionado. Planifica tus rutas para evitar el tráfico pesado y combina viajes cuando sea posible. Considera el uso de aceite de motor de baja viscosidad recomendado por el fabricante. Por último, si tu coche tiene un sistema start-stop, úsalo en el tráfico urbano para reducir el consumo en ralentí.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">¿Cuáles son las ventajas y desventajas de los coches eléctricos frente a los de combustión?</button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Los coches eléctricos ofrecen varias ventajas sobre los de combustión. Son más respetuosos con el medio ambiente, ya que no emiten gases contaminantes durante su uso. Tienen costos de operación más bajos debido a la menor necesidad de mantenimiento y el menor costo de la electricidad comparado con el combustible. Además, ofrecen una conducción más silenciosa y suave. Sin embargo, también presentan algunas desventajas. La autonomía puede ser limitada en comparación con los coches de combustión, aunque esto está mejorando con las nuevas tecnologías de baterías. Los tiempos de recarga son más largos que el repostaje de combustible. El costo inicial de un coche eléctrico suele ser más alto, aunque esto puede compensarse con los menores costos de operación a largo plazo. Por último, la infraestructura de carga, aunque en expansión, aún no es tan extensa como la red de estaciones de servicio tradicionales.
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php 
        include "pie.php";
        ?>
    </body>
</html>
