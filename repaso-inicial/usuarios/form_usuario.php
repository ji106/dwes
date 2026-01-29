<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <?php
    $usuario = [
        'nombre' => 'Ana',
        'email' => 'ana@correo.com',
        'edad' => 25
    ];

    echo "<h1>Usuarios</h1>";
    foreach ($usuario as $clave => $valor) {
        echo "$clave: $valor <br>";
    }
    echo "<br><hr>";

    // Acceder al email
    echo "<h3>1. Acceder a EMAIL</h3>";
    echo $usuario['email'];

    // Cambiar la edad
    $usuario['edad'] = 26;

    // Añadir una ciudad
    $usuario['ciudad'] = 'Málaga';

    // Mostar todos los datos con tabla
    echo "<h3>2. Datos del USUARIO</h3>";
    foreach ($usuario as $clave => $valor) {
        echo "$clave: $valor";
        echo "<br>";
    }

    // Usar POST
    echo "<h3>3. Datos recibidos por POST</h3>";
    if (isset($_POST['nombre'])) {
        echo "Datos recibidos (con foreach)";
        echo "<br>";

        // Recorremos POST como cualquier otro array
        foreach($_POST as $clave => $valor) {
            echo "$clave: $valor";
        }
    }
    ?>
</body>
</html>