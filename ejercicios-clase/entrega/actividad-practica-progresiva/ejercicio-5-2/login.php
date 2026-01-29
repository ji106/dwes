<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5.2: El Login Simulado</title>
</head>
<body>
    <?php
    $baseDeDatos = [
        "admin" => "1234",
        "user" => "0000"
    ];

    $usuarioInput = "admin";
    $passInput = "1234";

    if (isset($baseDeDatos[$usuarioInput])) {
        if ($baseDeDatos[$usuarioInput] == $passInput) {
            echo "<h1>Bienvenido!</h1>";
        } else {
            echo "<h3>Contraseña incorrecta</h3>";
        }
    } else {
        echo "<h3>Usuario no encontrado</h3>";
    }
    ?>
</body>
</html>