<?php
if (isset($_POST['guardar'])) {
    include "dbTienda.php";
    $tienda = new dbTienda[];

    $tienda->insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock']);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
</head>
<body>
    <h1>Añadir Nuevo Producto</h1>
    <form action="crear.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <input type="submit" name="guardar" value="Guardar Producto">
    </form>
    <a href="index.php">Volver al listado</a>
</body>
</html>'