<?php
class CalculadoraMedia {
    private $numeros = [];

    public function __construct($numeros) {
        $this->numeros = $numeros;
    }

    public function calcularMedia() {
        $suma = array_sum($this->numeros); // Suma todos los números
        return round($suma / count($this->numeros), 2); // Calcula la media y redondea a 2 decimales
    }

    public function obtenerNumeros() {
        return $this->numeros;
    }
}
?>
