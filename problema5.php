<?php include_once("validaciones.php"); ?>
<!-- problema 5 -->
<html>
<head>
    <title>Problema #5 - Clasificación por Edad</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #5 - Clasificación por Edad</h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <form action="" method="post" class="formulario-media">
            <h2>Introduce las edades de 5 personas</h2>

            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='text' name='edad$i' required placeholder='Edad de la persona $i' class='input-numero'><br>";
                }
            ?>

            <button type="submit" class="boton-accion">Clasificar Edades</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valido = true;
            $clasificacion = [];

                for ($i = 1; $i <= 5; $i++) {
                    $edad = $_POST["edad$i"];

                    if (!Validador::esVacio($edad, "Edad de la persona $i")) {
                        $valido = false;
                        continue;
                    }

                    if (!Validador::esNumero($edad, "Edad de la persona $i")) {
                        $valido = false;
                        continue;
                    }

                    if ($edad < 0) {
                        echo "<p class='resultado-error'>Edad de la persona $i no válida. Debe ser un número mayor o igual a 0.</p>";
                        $valido = false;
                        continue;
                    }

                    // Clasificación
                    if ($edad <= 12) {
                        $clasificacion[] = "<span class='media-negro'>Persona $i: Niño (Edad: $edad)</span>";
                    } elseif ($edad <= 17) {
                        $clasificacion[] = "<span class='media-negro'>Persona $i: Adolescente (Edad: $edad)</span>";
                    } elseif ($edad <= 64) {
                        $clasificacion[] = "<span class='media-negro'>Persona $i: Adulto (Edad: $edad)</span>";
                    } else {
                        $clasificacion[] = "<span class='media-negro'>Persona $i: Adulto Mayor (Edad: $edad)</span>";
                    }
                }


            if ($valido) {
                echo "<div class='respuesta-suma'>";
                echo "<h4><strong>Clasificación de Edades</strong></h4>";
                foreach ($clasificacion as $clas) {
                    echo "<p>$clas</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </div>

    <footer>
        © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano <br>
        <?php echo "Fecha: " . date("d")." / ".date("m"). " / ".date("Y"); ?>
    </footer>

</body>
</html>
