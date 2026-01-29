<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Pseudovariable $this</title>
</head>
<body>
    <?php
        class ClaseSencilla {
            public $var = 3;

            public function mostrarVar() {
                // Correcto: accede a la propiedad
                echo $this->var; // Imrpime 3
            }

            public function mostrarVar2() {
                // Incorrecto: busca una variable local
                echo $var; // No imprime nada (Warning)
            }
        }
        $obj = new ClaseSencilla();
        $obj->mostrarVar();
        $obj->mostrarVar2();
    ?>
</body>
</html>