<!-- problema 10 -->
<?php include_once("validaciones.php");  //para utilizar funciones de validación?>
<html>
<head>
    <title>Problema #8 - Primeros Multiplos de 4 </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #10 - Mostrar los "n" Multiplos de 4 </h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <div class="respuesta-suma">
            <form action="" method = "post">
                <h2>Ingrese un Valor para n</h2>
                <br>
                Ingrese un número:
                <input type="number" name="n" id="n" required placeholder="Ingrese un número entero positivo">
                <br> <br>
                <br>
                <button type="submit" name="Mostrar" id="mostrar" class="boton-accion" >Mostrar</button>
            </form>
        </div>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $n = $_POST["n"];
                $valido = true; //para utilizar la clase de validación

                //validar el valor ingresado por el usuario utilizando la clase
                if(!Validador::esVacio($n, "n"))
                    $valido = false;
                if(!Validador::esNumero($n, "n"))
                    $valido = false;
                if(!Validador::esPositivo($n, "n"))
                    $valido = false;

                //para verificar lo del desbordamiento
                if($n > 1000){
                    echo "<p class='resultado-error'>El número ingresado es demasiado grande. Por favor, ingrese un número menor o igual a 1000.</p>";
                    $valido = false;
                }
                if($valido){
                    //proceso luego de validaciones
                    
                    echo "<div class='respuesta-suma'>";
                    echo "<h3>Primeros $n múltiplos de 4:</h3>";
            
                    for ($i = 1; $i <= $n; $i++) {
                        $multiplo = 4 * $i;
                        echo "4 * $i = $multiplo<br>";
                    }
                    echo "</div>";
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