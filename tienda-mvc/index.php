<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de tienda</title>
</head>
<body>
    <h1>Gestión de productos</h1>
    <a href="crear.php"> + Añadir un nuevo producto</a>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
        include "dbTienda.php";
        $tienda = new dBTienda();
        $lista = $tienda->listarProductos();
        
        foreach ($lista as $producto) {
            echo "<tr>";
            echo "<td>". $producto['id'] . "</td>";
            echo "<td>". $producto['nombre'] . "</td>";
            echo "<td>". $producto['precio'] . " €</td>";
            echo "<td>". $producto['stock'] . " uds</td>";
            echo "</tr>";
        }
        echo "<td>";
        echo "<a href='editar.php' id=" . $producto['id'] . ">Editar</a>";
        echo "</td>";
        ?>
    </table>
</body>
</html>