<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $palabras = ["Hola", "Mundo", "PHP", "Genial"];

    foreach($palabras as $palabra) {
        $letra = substr("palabra", 0, 1);
        echo $letra."<br>";
    }
    ?>
</body>
</html>