<?php
class Estaciones {
   
    //método para obtener la estación del año
public static function obtenerEstacion($fecha) {
    //variables a utilizar
    $mes = date("m", strtotime($fecha));
    $dia = date("d", strtotime($fecha));
    $respuesta = "";
    $imagen = "";

//determinar la estacion del año
        if (($mes == 12 && $dia >= 21) || ($mes == 1) || ($mes == 2) || ($mes == 3 && $dia <= 20)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Verano.";
                        $imagen = "gaticoVeraniego.jpg"; // Imagen de verano
                    } elseif (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia <= 21)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Otoño.";
                        $imagen = "gaticoOtoñal.jpg"; // Imagen de otoño
                    } elseif (($mes == 6 && $dia >= 22) || ($mes == 7) || ($mes == 8) || ($mes == 9 && $dia <= 22)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Invierno.";
                        $imagen = "gaticoInvernal.jpg"; // Imagen de invierno
                    } elseif (($mes == 9 && $dia >= 23) || ($mes == 10) || ($mes == 11) || ($mes == 12 && $dia <= 20)) {
                        $respuesta = "La fecha " . $fecha . " corresponde a Primavera.";
                        $imagen = "gaticosPrimaverales.jpg"; // Imagen de primavera
                    } else {
                        $respuesta = "No se pudo determinar la estación del año.";
                    }
                    
        return ["respuesta" => $respuesta, "imagen" => $imagen];//arreglo asociativo con la respuesta y la imagen
    }
}
?>