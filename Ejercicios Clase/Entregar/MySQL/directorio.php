<?php
$server = "localhost";
$db = "empresa_db";
$username = "root";
$password = "";

$mysqli = new mysqli($server, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Error de conexción a MySQL: " . htmlspecialchars($mysqli->connect_error));
}

if (!$mysqli->set_charset("utf8mb4")) {
    die("No se pudo establecer UTF-8: " . htmlspecialchars($mysqli->error));
}

$sql = "SELECT id, nombre, apellidos, cargo, email FROM empleados ORDER BY id ASC";
$res = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Empleados</h2>
    <?php
    if ($res && $res->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre Completo</th><th>Cargo</th><th>Email</th></tr>";
        
        while ($fila = $res->fetch_assoc()) {
            $nombreCompleto = $fila["nombre"] . " " . $fila["apellidos"];
            echo "<tr>";
            echo "<td>" . $fila["id"] . "</td>";
            echo "<td>" . $nombreCompleto . "</td>";
            echo "<td>" . $fila["cargo"] . "</td>";
            echo "<td>" . $fila["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay empleados registrados.";
    }

    $mysqli->close();
    ?>
</body>
</html>

