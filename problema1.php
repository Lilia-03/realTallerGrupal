<?php
include_once("validaciones.php");
?>

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
    <div class="caja-datos">
        <!--Formulario con 5 campos de entrada-->
        <form action="" method="post" class="formulario-media">
            <h2>Introduce 5 números positivos</h2>
            <?php //ciclo para los 5 campos
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='text' name='num$i' required placeholder='Número $i' class='input-numero'><br>";
                }
            ?>
            <br>
            <!--Botón para mandar los campos-->
            <button type="submit" class="boton-accion">Calcular Media</button>
        </form>
    </div>

        <!--Proceso en php para enviar el formulario-->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $suma = 0; //almacena la suma total de los 5 números
            $valido = true; //indica si los números pasaron las validaciones
            $numeros = []; //arreglo vacío en el que se guardan los números válidos que ingresen los usuarios

            for ($i = 1; $i <= 5; $i++) {
                $num = $_POST["num$i"]; //accede a los valores enviados por el formulario y guarda su valor en num

                if (
                    !Validador::esVacio($num, "Número $i") ||
                    !Validador::esNumero($num, "Número $i") ||
                    !Validador::esPositivo($num, "Número $i")
                ) {
                    $valido = false;
                    continue;
                }

                $suma += $num;
                $numeros[] = $num;
            }

            if ($valido) {
                $media = round($suma / 5, 2); //redondea a 2 decimales
                echo "<div class='respuesta-suma'>";
                echo "<h4><strong>Datos Ingresados</strong></h4>";
                foreach ($numeros as $index => $valor) {
                    $n = $index + 1;
                    echo "<p><strong>Número $n:</strong> $valor</p>";
                }
                echo "<p><strong>Media de los números:</strong> <span class='resultado-media'>$media</span></p>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <footer>
    © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano <br>
        <?php 
        echo "Fecha: " . date("d")." / ".date("m"). " / ".date("Y");
        ?>
    </footer>

</body>
</html>
