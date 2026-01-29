<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
</head>
<body>
    <?php
    $num = [10, 12];

    echo "<h1>Suma</h1>";
    foreach ($num as $clave => $valor) {
        echo "$clave: $valor <br>";
    }
    echo "<br><hr>";

    // Sumar los elementos del ARRAY
    echo "<h3>1. Resultado de la suma</h3>";
    echo $num[0] + $num[1];
    ?>
</body>
</html>