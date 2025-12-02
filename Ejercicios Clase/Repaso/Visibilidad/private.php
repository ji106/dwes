<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visibilidad: public vs private</title>
</head>
<body>
    <?php
        class Coche {
            private $color = 'Verde';

            // Getter para $color
            public function getColor() {
                return $this -> color;
            }

            // Setter para $color
            public function setColor($nuevoColor) {
                $this -> color = $nuevoColor;
            }
        }

        $miCoche = new Coche();
        $miCoche -> setColor('Azul'); // FUNCIONA
        echo $miCoche -> getColor(); // Imprime "Azul"
    ?>
</body>
</html>