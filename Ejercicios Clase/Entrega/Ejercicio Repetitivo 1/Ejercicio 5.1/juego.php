<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5.1: Generador de Cartas de Jugador</title>
</head>
<body>
    <?php
    class Jugador {
        private $apodo;
        private $puntos;

        public function __construct($apodo, $puntos) {
            $this->apodo = $apodo;
            $this->puntos = $puntos;
        }

        public function setApodo($apodo) {
            $this->apodo = $apodo;
        }

        public function getApodo() {
            return $this->apodo;
        }

        public function setPuntos($puntos) {
            $this->puntos = $puntos;
        }

        public function getPuntos() {
            return $this->puntos;
        }

        public function getInfo() {
            echo "Jugador: " . $this->apodo . " (" . $this->puntos . " pts)";
        }
    }

    $equipo = [];
    $equipo[] = new Jugador("Lucas", 21);
    $equipo[] = new Jugador("Hugo", 10);
    $equipo[] = new Jugador("Nico", 23);
    ?>
</body>
<h1>Equipo</h1>
<ul>
    <?php
    foreach ($equipo as $jugador) {
        echo "<li>";
        echo $jugador->getInfo();
        echo "</li>";
    }
    ?>
</ul>
</html>