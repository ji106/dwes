<?php
// EJERCICIO 4: Ingeniería de Datos Avanzada (Debe ser UNIQUE)
// Configuración del servidor
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'pettinder_db';

// Conexión al servidor MySQL
// Especificamos la BD en el DSN que creamos anteriormente
$pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Creación de la tabla usuarios
$sqlUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB;";
$pdo->exec($sqlUsuarios);

// Creación de la tabla matches
// Si usuarios existe en otra tabla, no se borra
// Si borramos mascotas, borramos todo lo relacionado con ella
$sqlMatches = "CREATE TABLE IF NOT EXISTS matches (
        usuario_id INT NOT NULL,
        mascota_id INT NOT NULL,
        PRIMARY KEY (usuario_id, mascota_id),
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE RESTRICT,
        FOREIGN KEY (mascota_id) REFERENCES mascotas(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;";
$pdo->exec($sqlMatches);

echo "<p class='ok'>[OK] Tabla 'matches' creada con Claves Foráneas.</p>";
