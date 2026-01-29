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
            public $color = 'Verde';
        }

        $miCoche = new Coche();
        $miCoche -> color = 'Azul'; // FUNCIONA
        echo $miCoche -> color; // FUNCIONA
    ?>
</body>
</html>