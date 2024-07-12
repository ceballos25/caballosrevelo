<?php
// load_numbers.php

require_once('config/Database.php');
require_once('functions/numeros.php');

// Obtener el número de página actual de la solicitud GET, por defecto es 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

try {
    // Obtener números y total de páginas
    list($numeros, $totalPages) = getNumeros($page);

    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'numeros' => $numeros,
    ];

    // Devolver respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (Exception $e) {
    // Manejar errores internos del servidor
    http_response_code(500);
    echo json_encode(['error' => 'Error cargando números: ' . $e->getMessage()]);
}
?>
