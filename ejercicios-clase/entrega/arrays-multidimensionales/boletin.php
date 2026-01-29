<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Boletín de Notas Digital</title>
    <style>
        body {
            text-align: center;
            font-family: arial;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            border: 1px solid rgb(170, 170, 170);

            th {
                background-color: black;
                color: white;
                padding: 0.5rem 3rem;
            }

            tr.SÍ {
                background-color:rgb(218, 255, 210);
            }

            tr.NO {
                background-color: rgb(255, 210, 210);
            }

            td {
                padding: 0.5rem 0;
            }

            td.SÍ {
                color: rgb(94, 189, 73);
            }
                
            td.NO {
                color: rgb(189, 73, 73);
            }

            .media, td.SÍ, td.NO {
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
    <?php
        $clase = [
            [    
                "nombre" => "Paco Gómez",
                "grupo" => "A",
                "notas" => [
                    "DWECL" => 8,
                    "DWES" => 7,
                    "Despliegue" => 9
                ]
            ],
            [    
                "nombre" => "Marta López",
                "grupo" => "A",
                "notas" => [
                    "DWECL" => 4.5,
                    "DWES" => 5,
                    "Despliegue" => 5
                ]
            ],
            [    
                "nombre" => "Luis García",
                "grupo" => "B",
                "notas" => [
                    "DWECL" => 3,
                    "DWES" => 4,
                    "Despliegue" => 2
                ]
            ],
            [    
                "nombre" => "Ana Ruíz",
                "grupo" => "B",
                "notas" => [
                    "DWECL" => 9,
                    "DWES" => 9.5,
                    "Despliegue" => 10
                ]
            ]
        ];

        echo "<h1>Boletín de Calificaciones - 2º DAW</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Alumno</th>";
        echo "<th>Grupo</th>";
        echo "<th>DWES</th>";
        echo "<th>DWECL</th>";
        echo "<th>Despliegue</th>";
        echo "<th>Media</th>";
        echo "<th>¿Promociona?</th>";
        echo "</tr>";

        foreach ($clase as $alumno) {
            $notas = $alumno["notas"];
            $suma = 0;
            $contador = 0;
            $sinSuspensos = true;

            foreach ($notas as $nota) {
                $suma += $nota;
                $contador++;
                if ($nota < 4) {
                    $sinSuspensos = false;
                }
                
            }
            $media = round($suma / $contador, 2);
            $promociona = ($media >= 5 && $sinSuspensos) ? "SÍ" : "NO";
        
            echo "<tr class='$promociona'>";
            echo "<td>" . $alumno['nombre'] . "</td>";
            echo "<td>" . $alumno['grupo'] . "</td>";
            echo "<td>" . $notas['DWES'] . "</td>";
            echo "<td>" . $notas['DWECL'] . "</td>";
            echo "<td>" . {$notas['Despliegue'] . "</td>";
            echo "<td class='media'>$media</td>";
            echo "<td class='$promociona'>$promociona</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>

    
</body>
</html>