<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.2; El Dado Virtual (SWITCH)</title>
</head>
<body>
    <?php
    $dado = 1;

    switch ($dado) {
        case 1:
            echo "Pifia";
            break;
        case 6:
            echo "Crítico";
            break;
        default:
            echo "Tienda normal";
    }
    ?>
</body>
</html>