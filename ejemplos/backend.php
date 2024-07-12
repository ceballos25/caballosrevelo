<?php
// Número total de elementos (en este caso, 1000 números)
$totalItems = 1000;

// Número de elementos por página
$itemsPerPage = 50;

// Calcula el número total de páginas
$totalPages = ceil($totalItems / $itemsPerPage);

// Obtiene el número de página actual de la solicitud GET, por defecto es 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calcula el índice del primer elemento en la página actual
$startIndex = ($page - 1) * $itemsPerPage;

// Genera los números para la página actual
$numbers = range($startIndex + 1, min($startIndex + $itemsPerPage, $totalItems));

// Crea un array con los números y la información de paginación
$response = [
    'numbers' => $numbers,
    'totalPages' => $totalPages,
    'currentPage' => $page
];

// Devuelve la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
