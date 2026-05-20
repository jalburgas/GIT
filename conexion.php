<?php
// Conexión a SQLite (sin crear tablas ni insertar datos automáticamente)
$base_datos = __DIR__ . '/alumnos.db';

try {
    // Conectar a SQLite
    $conn = new PDO("sqlite:$base_datos");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexión establecida. No se crean tablas ni se insertan datos automáticamente.

} catch(PDOException $e) {
    die("❌ Error PDO: " . $e->getMessage());
}
?>