<?php 
include_once("validaciones.php"); 
include_once("logica/logica_p5.php");
?>
<!-- problema 5 -->
<html>

<head>
    <title>Problema #5 - Clasificación por Edad</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="header">
        <h1>Problema #5 - Clasificación por Edad</h1>
    </div>

    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <form action="" method="post" class="formulario-media">
            <h2>Introduce las edades de 5 personas</h2>

            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<input type='number' name='edad$i' required placeholder='Edad de la persona $i' class='input-numero'><br>";
                }
            ?>

            <button type="submit" class="boton-accion">Clasificar Edades</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valido = true;
            $clasificacion = [];
            //Contadores por categoría
            $contadores = ["niños" => 0, "adolescentes" => 0, "adultos" => 0, "adultos_mayores" => 0];

            for ($i = 1; $i <= 5; $i++) {
                $edad = $_POST["edad$i"];
                //por si el campo esta vacío
                if (!Validador::esVacio($edad, "persona $i")) {
                    $valido = false;
                    continue;
                }
                //solo números
                if (!Validador::esNumero($edad, "persona $i")) {
                    $valido = false;
                    continue;
                }
                //rango de números 0 a 100
                if (!Validador::esEdadValida($edad, "persona $i")) {
                    $valido = false;
                    continue;
                }

                // Clasificación
                $resultado = ClasificadorEdad::clasificar($edad);
                $categoria = $resultado["categoria"];
                $etiqueta = $resultado["etiqueta"];

            
                $clasificacion[] = "<span class='media-negro'>Persona $i: $etiqueta (Edad: $edad)</span>";
                $contadores[$categoria]++;
            }

            if ($valido) {
                echo "<div class='respuesta-suma'>";
                echo "<h4><strong>Clasificación de Edades</strong></h4>";
                foreach ($clasificacion as $clas) {
                    echo "<p>$clas</p>";
                }

                echo "<hr><h5><strong>Recuento:</strong></h5>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped text-center'>";
                echo "<thead class='table-dark'><tr><th>Niños</th><th>Adolescentes</th><th>Adultos</th><th>Adultos Mayores</th></tr></thead>";
                echo "<tbody><tr>";
                echo "<td>{$contadores['niños']}</td>";
                echo "<td>{$contadores['adolescentes']}</td>";
                echo "<td>{$contadores['adultos']}</td>";
                echo "<td>{$contadores['adultos_mayores']}</td>";
                echo "</tr></tbody></table></div>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <?php include_once("footer.php"); ?>

</body>
</html>
