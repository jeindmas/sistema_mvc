<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'sistema_mvc');
define('DB_USER', 'root');
define('DB_PASS', '');

// Crear conexión
function getConnection() {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
?>
