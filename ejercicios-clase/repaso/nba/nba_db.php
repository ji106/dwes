<?php
class dbNBA {
    // Atributos necesarios para la conexión
    private $host = "localhost";
    private $users = "root";
    private $pass = "";
    private $db_name = "nba";
    private $conexion; // Conector
    private $error = false; // Propiedad para controlar errores

    function _construct() {
        $this->conexion = new mysqli($this->host, $this->users, $this->pass, $this->db_name)
        if ($this->conexion->connect_errno) {
            $this->error = true;
        }
    }
    function hayError() {
        return $this->error;
    }

    public function devolverEquipos() {
        if ($this->error == false) {
            $resultado = $this->conexion->query("SELECT nombre FROM equipos");
            return $resultado;
        } else {
            return null;
        }
    }

    public function devolverEquipoConf($conferencia) {
        if ($this->error == false) {
            $resultado = $this->conexion->query("SELECT nombre, conferencia FROM equipos WHERE conferencia = '.$conferencia.'");
            return $resultado;
        } else {
            return null;
        }
    }
}


?>