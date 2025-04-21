<?php include_once("validaciones.php"); ?>
<!-- problema 7 -->
<html>
<head>
    <title>Calculadora de Datos Estadísticos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="header">
        <h1>Problema #7 - Calculadora de Datos Estadísticos</h1>
    </div>

    <!-- Botón de regreso -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">

        <!-- Pedir cantidad de notas -->
        <div class="caja-datos">
            <form action="" method="post" class="formulario-media">
                <h2>¿Cuántas notas desea ingresar?</h2>
                <input type="number" name="cantidad" min="1" required class="input-numero" placeholder="Cantidad de notas">
                <br><br>
                <button type="submit" name="definir" class="boton-accion">Definir cantidad</button>
            </form>
        </div>

        <?php
        if (isset($_POST["definir"])) {
            $cantidad = (int) $_POST["cantidad"];
            if ($cantidad > 0) {
                echo "<div class='caja-datos'>";
                echo "<form action='' method='post' class='formulario-media'>";
                echo "<h2>Ingrese las $cantidad notas</h2>";
                for ($i = 1; $i <= $cantidad; $i++) {
                    echo "<input type='text' name='notas[]' required placeholder='Nota $i' class='input-numero'><br>";
                }
                echo "<input type='hidden' name='cantidad' value='$cantidad'>";
                echo "<br><button type='submit' name='calcular' class='boton-accion'>Calcular estadísticas</button>";
                echo "</form>";
                echo "</div>";
            }
        }

        if (isset($_POST["calcular"])) {
            $notas = $_POST["notas"];
            $validas = [];
            $errores = [];

            foreach ($notas as $i => $nota) {
                $num = trim($nota);
                if (!Validador::esVacio($num, "Nota " . ($i + 1))) {
                    $errores[] = "La Nota " . ($i + 1) . " no puede estar vacía.";
                } elseif (!Validador::esNumero($num, "Nota " . ($i + 1))) {
                    $errores[] = "La Nota " . ($i + 1) . " debe ser un número válido.";
                } elseif ($num < 0) {
                    $errores[] = "La Nota " . ($i + 1) . " no puede ser negativa.";
                } else {
                    $validas[] = (float)$num;
                }
            }

            if (empty($errores)) {
                $count = count($validas); //Número total de notas por sumar
                $suma = array_sum($validas); //Suma de todas las notas integradas
                $media = $suma / $count; //Promedio de notas
                $min = min($validas); //Nota mínima
                $max = max($validas); //Nota máxima
                
                // Calcular la desviación estándar
                $acc = 0;
                foreach ($validas as $n) {
                    $acc += pow($n - $media, 2);
                }
                $desv = sqrt($acc / $count);

                echo "<div class='respuesta-suma'>";
                echo "<h4>Resultados Estadísticos</h4>";
                echo "<p><strong>Cantidad de notas ingresadas:</strong><br> $count</p>";
                echo "<p><strong>Notas ingresadas:</strong><br>";
                foreach ($validas as $idx => $n) {
                    echo "Nota " . ($idx + 1) . ": " . number_format($n, 1) . "<br>";
                }
                echo "</p>";
                echo "<p><strong>Promedio:</strong><br> " . number_format($media, 1) . "</p>";
                echo "<p><strong>Desviación estándar:</strong><br> " . number_format($desv, 1) . "</p>";
                echo "<p><strong>Nota mínima:</strong><br> " . number_format($min, 1) . "</p>";
                echo "<p><strong>Nota máxima:</strong><br> " . number_format($max, 1) . "</p>";
                echo "</div>";
            } else {
                foreach ($errores as $error) {
                    echo "<p class='resultado-error'>$error</p>";
                }
            }
        }
        ?>

    </div>

    <footer>
        © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano<br>
        <?php echo "Fecha: " . date("d/m/Y"); ?>
    </footer>

</body>
</html>
