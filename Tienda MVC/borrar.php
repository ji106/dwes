<?php
include "dbTienda.php";
$tienda = new dbTienda();

if (isset($_GET['id'])) {
    $tienda->borrar($_GET['id']);
    header["Location: index.php"];
    exit();
} else {
    header["Location: index.php"];
}

?>