<!-- problema 8 -->
<?php include_once("logica/validaciones.php");  //para utilizar funciones de validación?>
<?php include_once("logica/logica_p8.php");  //clase con los procesos logicos?>
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
                <button type="submit" name="Identificar" id="identificar" class="boton-accion" >Identificar</button>
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
                    //llamada al método de la clase Estaciones para obtener la estación
                    $resultado = Estaciones::obtenerEstacion($fecha);
                    $respuesta = $resultado["respuesta"];
                    $imagen = $resultado["imagen"];

                    //mostrar la respuest
                       echo "<div class='respuesta-suma'>
                        <h3>Estación para su Fecha:</h3>
                         <p class='resultado-media'>" . $respuesta . "</p>"; 
                        if ($imagen !== "") {
                            echo "<img src='fotos/" . $imagen . "' alt='" . $respuesta . "' class='imagen-estacion'>"; 
                            }
                        echo "</div>"; 
                   
                }
            }
        
            ?>
       
    </div>

    </div>

    <?php
        include_once("footer.php");
    ?>
    

</body>
</html>