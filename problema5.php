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
                // Mostrar los campos para las edades
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='text' name='edad$i' value='" . (isset($_POST["edad$i"]) ? $_POST["edad$i"] : '') . "' required placeholder='Edad de la persona $i' class='input-numero'><br>";
                }
            ?>

            <button type="submit" class="boton-accion">Clasificar Edades</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valido = true;
            $mensajes_error = [];
            $clasificacion = [];

            for ($i = 1; $i <= 5; $i++) {
                $edad = $_POST["edad$i"];

                // Validamos que el campo no esté vacío
                if (empty($edad)) {
                    $mensajes_error[] = "El campo para la persona $i no puede estar vacío.";
                    $valido = false;
                    continue;
                }

                // Validamos que sea un número
                if (!is_numeric($edad)) {
                    $mensajes_error[] = "La edad de la persona $i debe ser un número.";
                    $valido = false;
                    continue;
                }

                // Validamos que no sea un número negativo ni cero
                if ($edad <= 0) {
                    $mensajes_error[] = "La edad de la persona $i no puede ser negativa ni cero.";
                    $valido = false;
                    continue;
                }

                // Clasificación según la edad
                if ($edad <= 12) {
                    $clasificacion[] = "Persona $i (Edad: $edad): Niño (0-12 años)";
                } elseif ($edad <= 17) {
                    $clasificacion[] = "Persona $i (Edad: $edad): Adolescente (13-17 años)";
                } elseif ($edad <= 64) {
                    $clasificacion[] = "Persona $i (Edad: $edad): Adulto (18-64 años)";
                } else {
                    $clasificacion[] = "Persona $i (Edad: $edad): Adulto Mayor (65+ años)";
                }
            }

            // Mostrar los errores si los hay
            if (!$valido) {
                foreach ($mensajes_error as $mensaje) {
                    echo "<p class='resultado-error'>$mensaje</p>";
                }
            } else {
                // Mostrar las clasificaciones con las edades ingresadas
                echo "<h3>Clasificación de edades:</h3>";
                foreach ($clasificacion as $clas) {
                    echo "<p class='resultado-ok'>$clas</p>";
                }
            }
        }
        ?>

    </div>

    <footer>
        © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano
    </footer>

</body>
</html>
