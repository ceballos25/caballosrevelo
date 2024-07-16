<?php
// // Habilitar la visualización de errores
// ini_set('display_errors', 1);

// // Configurar el nivel de errores a reportar
// error_reporting(E_ALL);
require_once  '../config/database.php';
// Asegúrate de ajustar el nombre y la ubicación del archivo de conexión a la base de datos si es necesario

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['numbers']) || !is_array($input['numbers'])) {
    echo json_encode(['error' => 'Solicitud inválida']);
    exit;
}

$numbers = $input['numbers'];

try {
    $pdo = getDatabaseConnection();

    $placeholders = implode(',', array_fill(0, count($numbers), '?'));

    $stmt = $pdo->prepare("SELECT numero_disponible FROM numeros_disponibles WHERE numero_disponible IN ($placeholders) AND (vendido = 'p' OR vendido = 'x');");
    $stmt->execute($numbers);
    $reservedNumbers = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(['reservedNumbers' => $reservedNumbers]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
