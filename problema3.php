<!-- problema 3 -->
<html>
<head>
    <title>Problema #3 - Suma de Números Pares</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Para icono-->
</head>
<body>

    <div class="header">
        <h1>Problema #3 - Suma de los Primeros 10 Números Pares</h1>
    </div>

    <!-- Botón de regreso al menú -->
    <a href="index.php" class="boton-volver">
        <i class="fas fa-circle-arrow-left"></i> Volver al menú principal
    </a>

    <div class="contenedor centrar">
        <?php
            $suma = 0;
            $texto = "";

            for ($i = 1; $i <= 10; $i++) {
                $par = $i * 2;
                $suma += $par;

                if ($i < 10) {
                    $texto .= $par . " + ";
                } else {
                    $texto .= $par;
                }
            }
            ?>
    <div class="respuesta-suma">
        <?php
        echo "<p>Estamos sumando los primeros 10 números pares:</p>";
        echo "<p class='resultado-ok'>$texto</p>";
        echo "<p class='resultado-ok'>El resultado de la suma es: <strong>$suma</strong></p>";
        ?>
    </div>

    </div>

    <footer>
        © 2025 Grupo: 1GS131 | Realizado por Liliana Coronado y Mónica Serrano
    </footer>

</body>
</html>
