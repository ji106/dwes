<?php
require_once 'Vehiculo.php';

class Furgoneta extends Vehiculo {
    public function calcularCosteEnvio($distanciaKm) {
        $precioPorKm = 0.50;
    
        if ($this->cargaMaxima < 3000) {
            return $distanciaKm * $precioPorKm;
        } else {
            return $distanciaKm * ($precioPorKm * 1.30);
        }
    }
}

class Camion extends Vehiculo {
    private $esRegrigerado;
    public function __construct($matricula, $marca, $carga, $refrigerado) {
        parent::__construct($matricula, $marca, $carga);
        $this->esRegrigerado = $refrigerado;
    }

    public function calcularCosteEnvio($distanciaKm) {
        $precioPorKm = 1.0;
        $costeFijo = 50;
        $total = $costeFijo + ($distanciaKm * $precioPorKm);

        if ($this->esRegrigerado) {
            $total *= 1.25;
        }
        return $total;
    }
}
?>