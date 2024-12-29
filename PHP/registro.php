<?php
    include "cabecera.php";
?>

    <div class="container">
        <form action="#">
            <h2>Registrarse</h2>
            <div class="form">
                <input type="text" placeholder="Usuario" required>
            </div>
            <div class="form">
                <input type="password" placeholder="Contraseña" required>
            </div>
            <div class="form">
                <input type="email" placeholder="Correo electrónico" required>
            </div>
            <div class="form">
                <a href="inicioSesion.php">
                    <button type="button">Iniciar sesión</button>
                </a>
            </div>
            <div class="form">
                <button type="submit">Siguiente</button>
            </div>
        </form>
    </div>

<?php
    include "pie.php";
?>
