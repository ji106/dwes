<?php
// EJERCICIO 1: Conexión e Idempotencia (Configuración)
// Configuración del servidor
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'pettinder_db';

try {
    echo "<div class='fase'>";
    echo "<h2>FASE 1: Instalación e Infraestructura</h2>";
    echo "<hr>";

    // 1. Conexión al servidor MySQL
    // No especificamos la BD en el DSN porque puede que no exista aún
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Eliminamos la BD antigua
    $pdo->exec("DROP DATABASE IF EXISTS $dbName");
    echo "<p class='ok'>[OK] Base de datos antigua eliminada (Limpieza).</p>";

    // 2. Creación de la BD
    // Uso de IF NOT EXISTS para evitar errores
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "<p class='ok'>[OK] Base de datos '$dbName' creada y seleccionada.</p>";

    // 3. Selección de la BD
    $pdo->exec("USE $dbName");

    // EJERCICIO 2: Arquitectura de Datos (DDL)
    // 4. Creación de la tabla mascotas
    $sqlMascotas = "CREATE TABLE IF NOT EXISTS mascotas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            bio TEXT,
            likes INT DEFAULT 0
        ) ENGINE=InnoDB;";
    $pdo->exec($sqlMascotas);

    echo "<p class='ok'>[OK] Tabla 'usuarios' y 'mascotas' creadas (InnoDB).</p>";

    // EJERCICIO 3: Seeding y Seguridad (DML)
    // Inserción masiva de datos (Seeding)
    // Comprobamos que la tabla no tenga datos para evitar duplicarlo
    $stmt = $pdo->query("SELECT COUNT(*) FROM mascotas");
    $cantidadActual = $stmt->fetchColumn();

    if ($cantidadActual == 0) {
        echo "<p class='info'>[INFO] Tabla vacía. Insertando datos de prueba...</p>";
        // Inicio de transacción: vital para el rendimiento en inserciones masivas
        $pdo->beginTransaction();

        // Preparamos la sentencia una sola vez fuera del bucle (eficiencia)
        $insertStmt = $pdo->prepare("INSERT INTO mascotas (nombre, bio) VALUES (?, ?)");

        // Insertamos 2 mascotas aleatorias (uso de IA para generar datos aleatorios)
        $mascotas = [
            ['nombre' => 'Firulais', 'bio' => '🐶 Amigable y juguetón, busca un hogar lleno de amor.'],
            ['nombre' => 'Michi', 'bio' => '🐱 Sofisticado y tranquilo, le encanta dormir y ronronear.']
        ];

        foreach ($mascotas as $m) {
            $insertStmt->execute([$m['nombre'], $m['bio']]);
        }

        // Confimamos la transacción: se guardan los registros creados
        $pdo->commit();
        echo "<p class='ok'>[OK] Datos insertados correctamente mediante sentencias preparadas.</p>";
    } else {
        echo "<p class='info'>[INFO] La tabla ya contiene $cantidadActual registros. No se han insertado datos nuevos</p>";
    }
    echo "</div>";
} catch (PDOException $e) {
    // Si ocurre un error durante la transacción, rervertimos los cambios
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "<p class='error'>[ERROR] " . $e->getMessage() . "</p>";
}