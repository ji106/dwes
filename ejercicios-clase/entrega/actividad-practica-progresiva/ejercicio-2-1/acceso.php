<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.1: El Portero Automático (IF)</title>
</head>
<body>
    <?php
    $usuario = "admin";
    $nivel = 1;

    if ($usuario == "admin" && $nivel > 0) {
        echo "Acceso Total";
    } else {
        echo "Acceso Restringido";
    }
    ?>
</body>
</html>