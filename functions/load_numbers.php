<?php

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'revelos';
$username = 'root';
$password = '';

// Número de elementos por página
$itemsPerPage = 50;

try {
    // Conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtiene el número de página actual de la solicitud GET, por defecto es 1
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calcula el índice del primer elemento en la página actual
    $startIndex = ($page - 1) * $itemsPerPage;

    // Consulta para obtener el número total de elementos
    $stmt = $pdo->query("SELECT COUNT(*) FROM numeros_disponibles");
    $totalItems = $stmt->fetchColumn();

    // Calcula el número total de páginas
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Consulta para obtener los números de la página actual
    $stmt = $pdo->prepare("SELECT numero_disponible, vendido FROM numeros_disponibles LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $startIndex, PDO::PARAM_INT);
    $stmt->execute();
    $numbers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crea un array con los números y la información de paginación
    $response = [
        'numbers' => $numbers,
        'totalPages' => $totalPages,
        'currentPage' => $page
    ];

    // Devuelve la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    // Maneja errores de la base de datos
    http_response_code(500);
    echo json_encode(['error' => 'Error al conectar a la base de datos: ' . $e->getMessage()]);
}
?>