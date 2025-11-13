<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = ["Manzana", "Pera", "Naranja"];

    echo "<h1>Frutas</h1>";
    foreach ($frutas as $clave => $valor) {  
        echo "$clave: $valor <br>";
    }
    echo "<br><hr>";

    // Leer un array (Op.1)
    echo "<h3>1. Leer el array con bucle FOR</h3>";
    for ($i = 0; $i < count($frutas); $i++) {
        echo "<p>$frutas[$i]</p>";
    }

    // Leer un array (Op.2)
    echo "<h3>2. Leer el array directamente</h3>";
    echo "$frutas[0] <br>";
    echo "$frutas[1] <br>";
    echo "$frutas[2] <br>";

    // Cambiar el valor de un elemento
    $frutas[1] = "Melocotón";

    //Añadir un valor al array
    $frutas[] = "Plátano";

    // Mostrar el array completo con PRINT_R
    echo "<h3>3. Mostrar el array completo</h3>";
    print_r($frutas);

    // Leer el array
    echo "<h3>4. Leer el array con FOREACH</h3>";
    foreach($frutas as $fruta) {
        echo "$fruta <br>";
    }
    ?>
</body>
</html>