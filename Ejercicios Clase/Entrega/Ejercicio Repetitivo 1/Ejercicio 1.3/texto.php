<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.3: Corrector de Textos</title>
</head>
<body>
    <?php
    $mensaje = "hola mundo ";

    $resultado = trim(strtoupper($mensaje));

    echo "<p>$resultado</p>";
    ?>
</body>
</html>