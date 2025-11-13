<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos</title>
</head>
<body>
    <?php
    $modulos = ["Desarrollo en Entorno Servidor", "Desarrollo en Entorno Cliente", "Diseño de Interfaces Web"];
    
    echo "<h1>Módulos</h1>";
    foreach ($modulos as $clave => $valor) {
        echo "$clave: $valor <br>";
    }
    echo "<br><hr>";

    // Cambiar el primer módulo
    $modulos[0] = "Programación";

    // Añadir un nuevo módulo
    $modulos[] = "IPE II";

    // Mostrar el array completo
    echo "<h3>1. Mostrar el array completo con PRINT_R</h3>";
    print_r($modulos);
    ?>
</body>
</html>