<?php
class Asistente {
    private $nombre;
    private $email;
    private $edad;
    private $tipoEntrada;

    public function __construct($nombre, $email, $edad, $tipoEntrada) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
        $this->tipoEntrada = $tipoEntrada;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }
    
    public function getEdad() {
        return $this->edad;
    }

    public function setTipoEntrada($tipoEntrada) {
        $this->tipoEntrada = $tipoEntrada;
    }
    
    public function getTipoEntrada() {
        return $this->nombre;
    }

    public function calcularPrecio() {
        $precioBase = 50;

        switch ($this->tipoEntrada) {
            case 'vip':
                return $precioBase * 2;
            case 'estudiante':
                return $precioBase * 0.5;
            case 'general':
            default:
                return $precioBase;
        }
    }
}
?>