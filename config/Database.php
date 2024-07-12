<?php

function getDatabaseConnection() {
    $host = 'localhost';
    $db = 'revelos';
    $user = 'root';
    $pass = '';

    try {
        // Establecer conexión usando PDO
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activar el manejo de excepciones
            PDO::ATTR_EMULATE_PREPARES => false, // Desactivar emulación de preparación para consultas seguras
        ];
        $pdo = new PDO($dsn, $user, $pass, $options);

        return $pdo;
    } catch (PDOException $e) {
        // Lanzar una nueva excepción para manejar errores de conexión en el contexto adecuado
        throw new Exception('Error de conexión: ' . $e->getMessage());
    }
}
?>
