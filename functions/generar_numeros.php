<?php
// Incluir la clase Database (asegúrate de que el nombre del archivo coincida con la clase Database)
require_once('../config/Database.php');

try {
    // Crear una instancia de la clase Database para obtener la conexión
    $conn = getDatabaseConnection();

    // Truncar la tabla antes de insertar nuevos números (opcional)
    $truncateQuery = "TRUNCATE TABLE numeros_disponibles";
    $conn->query($truncateQuery);

    // Preparar la consulta para insertar los números con el estado por defecto
    $insertQuery = "INSERT INTO numeros_disponibles (numero_disponible, vendido) VALUES (:numero_disponible, '')";
    $stmt = $conn->prepare($insertQuery);

    // Generar y insertar números desde "000" hasta "999"
    for ($i = 0; $i <= 999; $i++) {
        $numero = str_pad($i, 3, '0', STR_PAD_LEFT); // Formatear el número a tres dígitos con ceros a la izquierda
        $stmt->bindValue(':numero_disponible', $numero, PDO::PARAM_STR); // Vincular parámetro
        $stmt->execute(); // Ejecutar la consulta
    }

    // Cerrar la conexión y liberar recursos
    $conn = null; // Cerrar la conexión explícitamente

    echo "Números únicos de tres cifras insertados correctamente en la tabla 'numeros_disponibles'.";
} catch (PDOException $e) {
    echo "Error al insertar números: " . $e->getMessage();
}
?>
