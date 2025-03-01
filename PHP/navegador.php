</head>
<body>
    <div class="cabecera">
        <div class="menu">
            <div class="menu_buttons">
                <a href="index.php?page=principal.php">Indice</a>
                <a href="index.php?page=contenido_general.php">Contenidos generales</a>
                <a href="index.php?page=coches.php">Todos los vehículos</a>
                <a href="index.php?page=consejos_mecanicos.php">Consejos mecánicos</a>
                <a href="index.php?page=contacto.php">Contacto</a>
                <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    require_once "../config/database.php";
                    require_once "../config/funciones.php";
                    

                    if (isset($_SESSION['id'])) {
                        $usuario = obtener_usuario_por_id($conexion, $_SESSION['id']);
                        if ($usuario === 'admin') {
                            echo "<a href='index.php?page=administrar.php'>Administrar</a>";
                        }
                    }


                ?>
            
                
            </div>
        </div>
    </div>

