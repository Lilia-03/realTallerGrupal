<!-- problema 2 -->
<html>
<head>
    <title>Problema #2 - Suma de Números </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #2 - Suma de Números del 1 al 1000</h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <?php
            //se guarda en esta variable el numero hasta el que queremos sumar
            $lim = 1000;

            //fórmula para el calculo
            $suma = ($lim * ($lim+1))/2;
            

    
            ?>
    <div class="respuesta-suma">
        <?php
        echo "<p>Calculando la suma de los número del 1 al 1000:</p>";
        echo "<p class='resultado-ok'>$suma</p>";
        echo "<p class='resultado-ok'>El resultado de la suma es: <strong>$suma</strong></p>";
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