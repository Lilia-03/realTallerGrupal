<!-- problema 6 -->
<?php include_once("logica/validaciones.php");  //para utilizar funciones de validación?>
<?php include_once("logica/logica_p6.php");  //clase con los procesos logicos?>
<html>
<head>
    <title>Problema #6 - Distribución de Presupuesto </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #6 - Distribución de Presupuesto por Departamento del Hospital</h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <div class="respuesta-suma">
            <form method= "post">
                <h2>Distribuir Presupuesto por Departamento</h2>
                    Ingrese el Presupuesto:
                    <input type="number" name="presupuesto" id ="presupueesto" require>
                    <br>
                    <br>
                    <br>
                <button type="submit" name= "Calcular" id = "calcular" class = "boton-accion">Calcular</button>
            </form>
        </div>  

        <?php
    
        if($_SERVER["REQUEST_METHOD"]== "POST"){
                $presupuesto= $_POST["presupuesto"];
                $valido = true; //para utilizar la clase de validación

                //validar el valor ingresado por el usuario utilizando la clase
                if(!Validador::esVacio($presupuesto, "presupuesto"))
                    $valido = false;
                if(!Validador::esNumero($presupuesto, "presupuesto"))
                    $valido = false;
                if(!Validador::esPositivo($presupuesto, "presupuesto"))
                    $valido = false;

                if($valido){
                    //proceso luego de validaciones
                    $distribucion =  DistribucionPresupuesto::calcularDistribucion($presupuesto);
                    
                    echo "<div class='respuesta-suma'>
                    <h3>Distribución del Presupuesto:</h3>
                    <p><strong>Presupuesto Ingresado: </strong>" . number_format($presupuesto, 2) . "</p>
                    <hr>";
                    
                    //Ciclo para mostrar la distribucion que esta almacenada en el arreglo
                    foreach ($distribucion as $departamento => $monto) {
                        echo "<p><strong>$departamento: </strong>" . number_format($monto, 2) . "</p>";

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

