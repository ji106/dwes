<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.2: Capitales del Mundo (Array Asociativo)</title>
</head>
<body>
    <?php
    $paises = [
        "España" => "Madrid",
        "Francia" => "París",
        "Italia" => "Roma"
    ];
    
    foreach ($paises as $pais => $capital) {
        echo "La capital de $pais es $capital<br>";
    }
    ?>
</body>
</html>