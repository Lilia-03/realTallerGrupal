<!-- problema 8 -->
<?php include_once("validaciones.php");  //para utilizar funciones de validación?>
<html>
<head>
    <title>Problema #8 - Estaciones del Año </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #8 - Detectar la Estación del Año </h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <div class="respuesta-suma">
            <form action="" method = "post">
                <h2>Detectar Estación del Año para la Fecha</h2>
                <br>
                Coloque la Fecha:
                <input type="date" name="fecha" id="fecha" required placeholder="Ingrese una fecha (YYYY-MM-DD)">
                <br> <br>
                <br>
                <input type="submit" name="Identificar" id="identificar" class="boton-accion" >
            </form>
        </div>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $fecha = $_POST["fecha"];
                $valido = true; //para utilizar la clase de validación

                //validar el valor ingresado por el usuario utilizando la clase
                if(!Validador::esVacio($fecha, "fecha"))
                    $valido = false;
                if(!Validador::esFecha($fecha, "fecha"))
                    $valido = false;

                if($valido){
                    //proceso luego de validaciones
                    $mes = date("m", strtotime($fecha));
                    $dia = date("d", strtotime($fecha));
                    $respuesta = ""; //para almacenar la respuesta

                    //determinar la estacion del año
                    if (($mes == 12 && $dia >= 21) || ($mes == 1) || ($mes == 2) || ($mes == 3 && $dia <= 20)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Verano.";
                    } elseif (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia <= 21)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Otoño.";
                    } elseif (($mes == 6 && $dia >= 22) || ($mes == 7) || ($mes == 8) || ($mes == 9 && $dia <= 22)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Invierno.";
                    } elseif (($mes == 9 && $dia >= 23) || ($mes == 10) || ($mes == 11) || ($mes == 12 && $dia <= 20)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Primavera.";
                    } else {
                        $respuesta = "No se pudo determinar la estación del año.";
                    }

                    //mostrar la respuest

                    echo "<div class='respuesta-suma'>
                    <h3>Estación para su Fecha:</h3>
                    <p class='resultado-media'>" . $respuesta . "</p>
                    </div>";
                }
            }
        
            ?>
    
       
    </div>

    </div>

    <footer>
        © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano <br>
        <?php 
        echo "Fecha: " . date("d")." / ".date("m"). " / ".date("Y");
        ?>
    </footer>

</body>
</html>