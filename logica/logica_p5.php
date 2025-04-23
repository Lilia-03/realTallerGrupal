<?php
class ClasificadorEdad {

    public static function clasificar($edad) {
        if ($edad <= 12) {
            return ["categoria" => "niños", "etiqueta" => "Niño"];
        } elseif ($edad <= 17) {
            return ["categoria" => "adolescentes", "etiqueta" => "Adolescente"];
        } elseif ($edad <= 64) {
            return ["categoria" => "adultos", "etiqueta" => "Adulto"];
        } else {
            return ["categoria" => "adultos_mayores", "etiqueta" => "Adulto Mayor"];
        }
    }
}
?>
