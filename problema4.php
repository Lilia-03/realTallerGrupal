<!-- problema 4 -->
<html>
<head>
    <title>Problema #4 - Suma de Números Pares e Impares </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #4 - Suma de Números Pares e Impares entre el 1 y 200 </h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <?php
            
            $sumaPar= 0;
            $sumaImpar= 0;
            //para mostrar los numeros que fueron sumados 
            $txtPar="";
            $txtImpar= "";

            //proceso
            for($i=1; $i<=200; $i++){
                //identificar los numeros pares

                if($i % 2 == 0){
                    $sumaPar+= $i;
                    $txtPar .= $i . "+";
                }
                else{
                    $sumaImpar += $i;
                    $txtImpar .= $i . "+";
                }  
            }

            //Para eliminar el + que queda de mas
            $txtPar=rtrim($txtPar, "+");
            $txtImpar= rtrim($txtImpar, "+");

            
            
            
    
            ?>
    <div class="respuesta-sumac">
    <h3>Suma de Números Pares:</h3>
            <p><?php echo $txtPar; ?></p>
            <p class='resultado-ok'><strong>Total: <?php echo $sumaPar; ?></strong></p>

            <hr>
            <h3>Suma de Números Impares:</h3>
            <p><?php echo $txtImpar; ?></p>
            <p class='resultado-ok'><strong>Total: <?php echo $sumaImpar; ?></strong></p>
        
       
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