<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.3: La Matriz de Notas (Mutidimensional)</title>
</head>
<body>
    <?php
    $alumnos = [
        [
            "nombre" => "Ana",
            "nota" => 8
        ],
        [
            "nombre" => "Luis",
            "nota" => 4
        ]
    ];

    foreach ($alumnos as $alumno) {
        if ($alumno['nota'] >= 5) {
            echo $alumno['nombre'] . ": Aprobado<br>";
        } else {
            echo $alumno['nombre'] . ": Suspenso<br>";
        }
    }
    ?>
</body>
</html>