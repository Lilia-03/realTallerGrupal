<?php
class MultiploDeCuatro {
    // Método para obtener los primeros "n" múltiplos de 4
    public static function obtenerMultiplos($n) {
        $resultados = [];

        //proceso luego de validaciones
        for ($i = 1; $i <= $n; $i++) {
            $multiplo = 4 * $i;
            $resultados[] = "4 * $i = $multiplo"; //arreglo para almacenar todos los resultados
        }

        return $resultados;
    }
}
?>