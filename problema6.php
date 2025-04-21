<!-- problema 6 -->
<?php
    require_once "validaciones.php"  ?>
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
                    $gine = $presupuesto * 0.40;
                    $trauma = $presupuesto * 0.35;
                    $pedi = $presupuesto * 0.25; 
                    
                    echo "<div class='respuesta-suma'>
                    <h3>Distribución del Presupuesto:</h3>
                    <p><strong>Presupuesto Ingresado: </strong>" . number_format($presupuesto, 2) . "</p>
                    <hr>
                    <p><strong>Ginecología (40%): </strong>" . number_format($gine, 2) . "</p>
                    <p><strong>Traumatología (35%): </strong>" . number_format($trauma, 2) . "</p>
                    <p><strong>Pediatría (25%): </strong>" . number_format($pedi, 2) . "</p>
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

