<?php
// ventasModel.php

// Incluir la función de conexión
include '../../config/database.php';

// Función para obtener el total de ventas
function obtenerTotalVentas()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT SUM(total_pagado) as total FROM ventas");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}

// funcion para obtener numeros vendidos
function obtenerTotalNumerosVendidos()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT count(*) as total_numeros_vendidos FROM numeros_vendidos");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_numeros_vendidos'];
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}


// funcion para obtener numeros vendidos
function obtenerTotalClientes()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT count(*) as total_clientes FROM clientes");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_clientes'];
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}

//faltan por vender
function obtenerFaltanPorVender()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT count(*) as faltan_por_vender FROM numeros_disponibles where vendido = '' ");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['faltan_por_vender'];
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}

function obtenerCiudadesConMasVentas()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("
            SELECT c.ciudad_cliente AS ciudad, SUM(v.total_pagado) AS total_ventas
            FROM clientes c
            JOIN ventas v ON c.id_cliente = v.id_cliente
            GROUP BY c.ciudad_cliente
            ORDER BY total_ventas DESC
            LIMIT 10
        ");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Formatear los valores de total_ventas en formato de moneda
        foreach ($result as $row) {
            $row['total_ventas'] = '$' . number_format($row['total_ventas'], 0, ',', '.'); // Ejemplo: $1.500.000
        }

        return $result; // Devuelve las 10 ciudades con más ventas, con valores formateados
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}


//ventas por tipo de ventas
function obtenerVentasPorTipo()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT tipo_venta, COUNT(*) AS cantidad_ventas
                             FROM ventas
                             GROUP BY tipo_venta
                             ORDER BY cantidad_ventas DESC");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mapear los tipos de venta a descripciones legibles
        foreach ($result as &$venta) {
            switch ($venta['tipo_venta']) {
                case 'PW':
                    $venta['tipo_venta'] = 'Página Web';
                    break;
                case 'VM':
                    $venta['tipo_venta'] = 'Venta Manual';
                    break;
                default:
                    $venta['tipo_venta'] = 'Otro'; // Puedes agregar más casos si es necesario
                    break;
            }
        }
        return $result; // Devuelve el resultado como un array asociativo
    } catch (Exception $e) {
        // Manejo de errores
        return 'Error: ' . $e->getMessage();
    }
}


// obtener clientes
function obtenerClientes()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT id_cliente, nombre_cliente, celular_cliente, correo_cliente, departamento_cliente, ciudad_cliente FROM clientes");
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}


//obtener numeros
function obtenerNumeros()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT numero_disponible, vendido FROM numeros_disponibles");
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}


//obtener detalle de ventas
function obtenerDetalleVentas()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT
            ventas.id_venta,
            clientes.nombre_cliente,
            clientes.celular_cliente,
            clientes.correo_cliente,
            clientes.departamento_cliente,
            clientes.ciudad_cliente,
            ventas.total_numero,
            ventas.total_pagado,
            ventas.fecha,
            ventas.estado,
            ventas.tipo_venta,
            ventas.id_pasarela
        FROM
            ventas
        INNER JOIN
            clientes
        ON
            ventas.id_cliente = clientes.id_cliente
        ");
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}


//obtener detalle de ventas
function obtenerNumerosVendidos()
{
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT
    ventas.id_venta,
    clientes.nombre_cliente,
    clientes.celular_cliente,
    clientes.ciudad_cliente,
    ventas.tipo_venta,
    ventas.fecha,
    numeros_vendidos.numero
FROM
    ventas
INNER JOIN
    clientes ON ventas.id_cliente = clientes.id_cliente
INNER JOIN
    numeros_vendidos ON ventas.id_venta = numeros_vendidos.id_venta;
        ");
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}
