<?php
// EJERCICIO 5: Transacciones ACID (Lógica de Negocio)
// Configuración del servidor
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'pettinder_db';

// Simulación
$usuarioID = 1;
$mascotaID = 1;

// Creamos la clase mascota para saber su estado
class Mascota {
    public $nombre;
    public $likes;

    public function getEstado() {
        return ($this->likes > 10) ? "POPULAR" : "NUEVO";
    }
}

try {
    echo "<div class='fase'>";
    echo "<h2>FASE 2: Transacciones y Consultas</h2>";
    echo "<hr>";
    // Conexión al servidor MySQL
    // Especificamos la BD en el DSN que creamos anteriormente
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creación de un usuario para testear
    $pdo->exec("INSERT IGNORE INTO usuarios (id, email, password) VALUES (1, 'test@pettinder.com', '1234')");

    $pdo->exec("UPDATE mascotas SET likes = 6 WHERE nombre = 'Firulais'");
    $pdo->exec("UPDATE mascotas SET likes = 15 WHERE nombre = 'Michi'");
    
    // Transacción ACID
    $pdo->beginTransaction();

    // Insertar el like o registro en matches
    $stmtLike = $pdo->prepare("INSERT INTO matches (usuario_id, mascota_id) VALUES (?, ?)");
    $stmtLike->execute([$usuarioID, $mascotaID]);

    // Incrementar likes de mascotas
    $stmtUpdate = $pdo->prepare("UPDATE mascotas SET likes = likes + 1 WHERE id = ?");
    $stmtUpdate->execute([$mascotaID]);

    $pdo->commit();

    echo "<p class='ok'>[TRANSACCIÓN EXITOSA] Se ha registrado el Match y actualizado el contador.</p>";
    echo "<h3>Listado de Mascotas (Modo objeto)</h3>";

    $stmt = $pdo->query("SELECT nombre, likes FROM mascotas");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Mascota');

    while ($m = $stmt->fetch()) {
        $estado = $m->getEstado();
        echo "<p class='mascota'><span class=nombreMascota>{$m->nombre}</span> (Likes: {$m->likes}) <span class='$estado'>$estado</span></p>";
    }
    echo "</div>";
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "<p class='error'>[ERROR] Operación cancelada: el like no se pudo registrar.</p>";
}
