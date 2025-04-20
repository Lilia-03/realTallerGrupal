<!-- problema 1 -->
<html>
<head>
    <title>Calcular Media</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #1 - Media de 5 Números</h1>
    </div>

    <!-- Botón de regreso -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <form action="" method="post" class="formulario-media">
            <h2>Introduce 5 números positivos</h2>

            <?php
                // Mostramos los campos de los 5 números
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='text' name='num$i' required placeholder='Número $i' class='input-numero'><br>";
                }
            ?>
            <br>
            <button type="submit" class="boton-accion">Calcular Media</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $suma = 0;
            $valido = true;
            $mensajes_error = [];

            // Validación de los números introducidos
            for ($i = 1; $i <= 5; $i++) {
                // Recogemos el valor del campo
                $num = $_POST["num$i"];

                // Validamos que el campo no esté vacío
                if (empty($num)) {
                    $mensajes_error[] = "El campo Número $i no puede estar vacío.";
                    $valido = false;
                    continue;
                }

                // Validamos que no sea un número negativo
                if ($num < 0) {
                    $mensajes_error[] = "El número $i no puede ser negativo.";
                    $valido = false;
                    continue;
                }

                // Validamos que sea un número (no letras ni caracteres no permitidos)
                if (!is_numeric($num)) {
                    $mensajes_error[] = "El campo Número $i debe contener solo números.";
                    $valido = false;
                    continue;
                }

                // Si pasa todas las validaciones, sumamos el número
                $suma += $num;
            }

            // Si los datos son válidos, calculamos la media
            if ($valido) {
                $media = $suma / 5;
                echo "<p class='resultado-ok'>La media de los números es: $media</p>";
            } else {
                // Mostramos los errores
                foreach ($mensajes_error as $mensaje) {
                    echo "<p class='resultado-error'>$mensaje</p>";
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
