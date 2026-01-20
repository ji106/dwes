<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.1: La Lista de Tareas (Array Simple)</title>
</head>
<body>
    <?php
    $tareas = ["Comprar pan", "Estudiar PHP", "Hacer ejercicio"];
    array_push($tareas, "Dormir");
    foreach ($tareas as $tarea) {
        echo $tarea . "<br>";
    }
    ?>
</body>
</html>