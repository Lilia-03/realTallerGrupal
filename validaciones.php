<?php

class Validador {

    public static function esVacio($valor, $nombreCampo) {
        if (empty(trim($valor))) {
            echo "<p class='resultado-error'>El campo $nombreCampo no puede estar vacío.</p>";
            return false;
        }
        return true;
    }

    public static function esNumero($valor, $nombreCampo) {
        if (!is_numeric($valor)) {
            echo "<p class='resultado-error'>El campo $nombreCampo debe contener solo números.</p>";
            return false;
        }
        return true;
    }

    public static function esPositivo($valor, $nombreCampo) {
        if ($valor < 0) {
            echo "<p class='resultado-error'>El número en $nombreCampo debe ser mayor o igual que 0.</p>";
            return false;
        }
        return true;
    }
}

?>
