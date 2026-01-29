<!--Jiaxin Ji-->
<?php
// Jiaxin Ji

// EJERCICIO 1
$alumno = "Jiaxin Ji";
$asistencia = 90;

echo "<h1>Ficha Académica de $alumno - Asistencia: $asistencia%</h1>";
echo "<hr>";

// EJERCICIO 2
$nota_final = 9;
if ($nota_final < 5) {
    echo "Estado: Suspenso, debes recuperar.";
} elseif ($nota_final >= 5 && $nota_final <= 9) {
    echo "Estado: Aprobado, buen trabajo.";
} else {
    echo "Estado: Matrícula de Honor.";
}
echo "<hr>";

// EJERCICIO 3
$calificaciones = [
    "Programación" => 4.5,
    "Base de Datos" => 6.0,
    "Entornos" => 7.2,
    "Marcas" => 8.0
];
echo "<pre>";
print_r($calificaciones);
echo "</pre>";
echo "<hr>";

// EJERCICIO 4
echo "<h3>Boletín de Notas</h3>";
$suma_notas = 0;
echo "<table border='1'>";
echo "<tr>";
echo "<th>Asignatura</th>";
echo "<th>Nota</th>";
echo "</tr>";

foreach ($calificaciones as $asignatura => $nota) {
    echo "<tr>";
    echo "<td>$asignatura</td>";
    echo "<td>$nota</td>";
    echo "</tr>";

    $suma_notas += $nota;
}
echo "</table>";
echo "<h3>Nota Media del curso: " . $suma_notas/count($calificaciones) . "</h3>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 2</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px black;

            tr {
                th {
                    padding: 0.5rem;
                }
                td {
                    padding: 0.5rem;
                }
            }
        }
    </style>
</head>
<body>
    
</body>
</html>