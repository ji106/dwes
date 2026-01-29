<?php
if (isset($_POST['editar'])) {
    include "dbTienda.php";
    $tienda = new dbTienda();

    $tienda->insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock']);

    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];
    $dato = $tienda->buscarPorId($producto_id);
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Añadir Nuevo Producto</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $dato['id'];?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $dato['nombre'];?>"><br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $dato['precio'];?>"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $dato['stock'];?>">

        <input type="submit" name="actualizar" value="Actualizar Datos">
    </form>
    <a href="index.php">Cancelar y volver</a>
</body>
</html>