<!-- problema 9 -->
<html>
<head>
    <title>Problema #9 - Potencias de 4</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #9 - Primeras 15 Potencias de 4</h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>


    <div class="contenedor centrar">
        <div class="respuesta-suma">
            <p>Estas son las primeras 15 potencias de 4:</p>
            <?php
                for ($i = 1; $i <= 15; $i++) {
                    $potencia = pow(4, $i); //usamos la función pow para sacar las potencias de 4
                    echo "<p><strong>4<sup>$i</sup></strong> = <span class='resultado-media'>$potencia</span></p>";
                }
            ?>
        </div>
    </div>

    <?php
            include_once("footer.php");
        ?>
    

</body>
</html>
