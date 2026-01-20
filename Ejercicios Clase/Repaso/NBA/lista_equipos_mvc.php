<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de equipos</title>
</head>
<body>
    <?php
    // Incluimos la base de datos
    include "nba_db.php"
    // Creamos el objeto de la conexión, en este caso conectamos con "nba_db" (creado anteriormente)
    $nba = new nba_db();
    $resultado = $nba->devolverEquipos();
    if ($resultado != null) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "El equipo " . $fila['nombre'] . "<br>";
        }
    }

    ?>
</body>
</html>