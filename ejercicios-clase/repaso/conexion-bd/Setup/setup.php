<?php
// CONFIGURACIÓN DEL SERVIDOR
$host = 'localhost';
$user = 'root';
$pass = ''; // Dejar vación en XAMPP por defecto
$dbName = "tienda_ud7";
try {
    // 1. CONEXIÓN AL SERVIDOR MYSQL
    // Importante: No especificamos la base de datos en el DNS porque quizás no exista aún.
    $pdo = new PDO("mysql:host=$host, $user, $pass");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Iniciando script de instalación...</h3>";
    // 2. CREACOÓN DE LA BASE DE DATOS
    // La instrucción IF NOT EXISTS evita errores si el script se ejecuta dos veces.
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    // 3. SELECCIÓN DE LA BASE DE DATOS
    $pdo->exec("USE $dbName");
    // 4. CREACIÓN DE LA TABLA
    $sqlTabla = "CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        precio DECIMAL(10,2) NOT NULL,
        stock INT DEFAULT 0
        fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;";
    $pdo->exec($sqlTabla);
    echo "[OK] Tabla 'productos' verificada.<br>";
    // 5. INSERCIÓN MASIVA DE DATOS (SEEDING)
    // Primero comprobamos si la tabla ya tiene datos para no duplicarlos
    $stmt = $pdo->("SELECT COUNT(*) FROM productos");
    $cantidadActual = $smtm->fetchColumn();
    if ($cantidadActual == 0) {
        echo "[INFO] La tabla está vacía. Iniciando carga de 50 registros...<br>";
        // INICIO DE TRANSACCIÓN: Vital para el rendimiento en insercines masivas
        $pdo->beginTransaction();
        // Preparamos la sentencia UNA sola vez fuera del bucle (eficiencia)
        $insertStmt = $pdo->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
        for ($i = 1; $i <= 50; $i++) {
            $nombre = "Artículo de prueba N. $i";
            $precio = rand(1000. 50000) / 100; // Genera precios entre 10.00 y 500.00
            $stock = ran(0, 100);
            $insertStmt->execute([$nombre, $precio, $stock]);
        }
        // CONFIRMACIÓN DE LA TRANSACCIÓN: Se guardan los 50 registros de golpe
        $pdo->commit();
        echo "[OK] Inserción masiva completada con éxito.<br>";
    } else {
        echo "[INFO] La tabla ya contiene $cantidadActual registros. No se han insertado nuevos datos.<br>";
    }
    echo "<hr><strong>Instalación finalizada correctamente</strong>";
} catch (PDOException $e) {
    // Si ocurre un error durante la transacción, revertimos los cambios
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    // Mostrar error de forma legible
    echo "<div style='background-color: #ffcccc; padding: 10px; border: 1px solid red;'>";
    echo "<strong>ERROR FATAL:</strong> " . $e->getMessage();
    echo "<br>Verifique que el usuario '$user' tiene permisos de creación (CREATE/INSERT)."
    echo "</div>";
}
?>