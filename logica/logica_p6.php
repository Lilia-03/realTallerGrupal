<?php
class DistribucionPresupuesto {
    public static function calcularDistribucion($presupuesto) {
        //proceso luego de validaciones
        $distribucion = []; //para almacenar los resultados

        $distribucion["Ginecología"] = $presupuesto * 0.40;
        $distribucion["Traumatología"] = $presupuesto * 0.35;
        $distribucion["Pediatría"]    = $presupuesto * 0.25;

        return $distribucion; //almacenar los resultados en un arreglo
    }
}
?>