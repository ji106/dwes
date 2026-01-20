<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.3: La Tabla de Multiplicar (WHILE)</title>
</head>
<body>
    <?php
    $numero = 5;
    $i = 1;

    while ($i <= 10) {
        echo "$numero x $i = " . $numero * $i . "<br>";
        $i++;
    }
    ?>
</body>
</html>