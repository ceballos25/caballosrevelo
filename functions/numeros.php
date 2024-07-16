<?php
require_once  '../config/database.php'; // Incluir la función de conexión actualizada

function getNumeros($page = 1, $limit = 29) {
    $offset = ($page - 1) * $limit;

    try {
        // Conectarse a la base de datos usando PDO
        $pdo = getDatabaseConnection();        

        // Preparar consulta SQL para obtener números paginados
        $stmt = $pdo->prepare("SELECT * FROM numeros_disponibles LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener números
        $numeros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calcular el total de números y total de páginas
        $totalStmt = $pdo->query("SELECT COUNT(*) AS total FROM numeros_disponibles");
        $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($total / $limit);

        // Cerrar conexión (no es necesario, PDO lo gestiona automáticamente al finalizar el script)

        // Devolver números y total de páginas como un array
        return [$numeros, $totalPages];
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        throw new Exception('Error al obtener números: ' . $e->getMessage());
    }
}

