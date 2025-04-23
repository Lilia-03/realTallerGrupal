<?php
class CalculadoraEstadistica {
    private $datos;

    public function __construct(array $datos) {
        $this->datos = $datos;
    }

    public function contar() {
        return count($this->datos);
    }

    public function sumar() {
        return array_sum($this->datos);
    }

    public function promedio() {
        return $this->sumar() / $this->contar();
    }

    public function minimo() {
        return min($this->datos);
    }

    public function maximo() {
        return max($this->datos);
    }

    public function desviacionEstandar() {
        $media = $this->promedio();
        $suma = 0;
        foreach ($this->datos as $n) {
            $suma += pow($n - $media, 2);
        }
        return sqrt($suma / $this->contar());
    }

    public function getDatos() {
        return $this->datos;
    }
}
?>
