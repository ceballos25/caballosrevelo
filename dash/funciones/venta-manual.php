<?php
date_default_timezone_set('America/Bogota');
// Incluir el archivo de configuración de la base de datos
require_once('../../config/database.php');

require '../../vendor/autoload.php'; // Incluye la biblioteca PHPMailer
//enviamos en correo con los parametros correspondientes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Función para sanitizar entrada eliminando espacios, puntos, comas y signo $
function sanitizeInput($input)
{
    // Eliminar espacios en blanco al inicio y al final
    $input = trim($input);
    // Eliminar puntos, comas y signo $
    $input = str_replace(['.', ',', '$'], '', $input);
    // Eliminar barras invertidas (\)
    $input = stripslashes($input);
    // Convertir caracteres especiales en entidades HTML
    $input = htmlspecialchars($input);
    return $input;
}


// Función para obtener el ID de un cliente por su número de celular
function obtenerCliente($celularBuscado)
{
    // Obtener conexión a la base de datos
    $conexion = getDatabaseConnection();

    // Preparar la consulta SQL para buscar el ID del cliente por el número de celular
    $sql = "SELECT id_cliente FROM clientes WHERE celular_cliente = :celular_cliente";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(":celular_cliente", $celularBuscado, PDO::PARAM_STR);

    // Ejecutar la consultabase
    $stmt->execute();

    // Obtener el resultado de la consulta
    $clienteId = $stmt->fetchColumn();

    // Cerrar la conexión
    $conexion = null;

    return $clienteId; // Devolver el ID del cliente encontrado o null si no se encontró
}

// Función para insertar números vendidos asociados a una venta específica
function insertarNumerosVendidos($idVenta, $numerosSeleccionados)
{
    // Obtener conexión a la base de datos
    $conexion = getDatabaseConnection();

    try {
        // Preparar la consulta para insertar los números vendidos
        $stmt = $conexion->prepare("INSERT INTO numeros_vendidos (id_venta, numero) VALUES (:id_venta, :numero)");

        // Insertar cada número seleccionado
        foreach ($numerosSeleccionados as $numero) {
            $stmt->bindParam(":id_venta", $idVenta);
            $stmt->bindParam(":numero", $numero);
            $stmt->execute();
        }
    } catch (PDOException $e) {
        // Manejar cualquier error de PDO aquí
        exit("Algo salió mal error: 001");

    }

    // Cerrar la conexión
    $conexion = null;
}

// Función para actualizar el estado de los números disponibles
function actualizarEstadoNumeros($numerosSeleccionados)
{
    // Obtener conexión a la base de datos
    $conexion = getDatabaseConnection();

    try {
        // Preparar la consulta para actualizar los números disponibles
        $stmt = $conexion->prepare("UPDATE numeros_disponibles SET vendido = 'x' WHERE numero_disponible = :numero");

        // Actualizar cada número seleccionado
        foreach ($numerosSeleccionados as $numero) {
            $stmt->bindParam(":numero", $numero);
            $stmt->execute();
        }
    } catch (PDOException $e) {
        // Manejar cualquier error de PDO aquí
        exit("Algo salió mal error: 002");
    }

    // Cerrar la conexión
    $conexion = null;
}

// Verificar si se ha enviado el formulario usando el método GET
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y obtener los datos del formulario (Ajusta según los nombres de tus campos)
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $celular = sanitizeInput($_POST["celular"]);
    $departamento = sanitizeInput($_POST["departamento"]);
    $ciudad = sanitizeInput($_POST["ciudad"]);
    $totalNumeros = sanitizeInput($_POST["totalNumeros"]);
    $totalPagar = sanitizeInput($_POST["totalPagar"]);
    $codigoTransaccion = uniqid();
    $nombreCompleto = $nombre .' '. $apellido;
    $numerosSeleccionados = isset($_POST['numerosSeleccionados']) ? json_decode($_POST['numerosSeleccionados']) : [];
    // Convertir el array a un array indexado para asegurar que solo tengamos números y sin espacios en blanco
    $numerosSeleccionados = array_values(array_filter($numerosSeleccionados, 'is_numeric'));
    // Codificar el array en JSON
    $numerosSeleccionadosJson = json_encode($numerosSeleccionados);

    // Obtener la fecha y hora actual en el formato MySQL
    $fecha_venta = date('Y-m-d H:i:s');

    

    try {
        // Obtener el ID del cliente por su número de celular
        $clienteId = obtenerCliente($celular);

        // Si no se encontró un cliente con el celular, insertar uno nuevo
        if (!$clienteId) {
            // Iniciar una nueva conexión a la base de datos
            $conexion = getDatabaseConnection();

            // Preparar la consulta para insertar un nuevo cliente
            $stmtInsertCliente = $conexion->prepare("INSERT INTO clientes (nombre_cliente, celular_cliente, correo_cliente, departamento_cliente, ciudad_cliente)
                                                     VALUES (:nombre_cliente, :celular_cliente, :correo_cliente, :departamento_cliente, :ciudad_cliente)");

            // Ejecutar la consulta para insertar el nuevo cliente
            $stmtInsertCliente->bindParam(":nombre_cliente", $nombreCompleto);
            $stmtInsertCliente->bindParam(":celular_cliente", $celular);
            $stmtInsertCliente->bindParam(":correo_cliente", $correo);
            $stmtInsertCliente->bindParam(":departamento_cliente", $departamento);
            $stmtInsertCliente->bindParam(":ciudad_cliente", $ciudad);
            $stmtInsertCliente->execute();

            // Obtener el ID del cliente insertado
            $clienteId = $conexion->lastInsertId();

            // Cerrar la conexión
            $conexion = null;
        }

        // Insertar la venta en la tabla de ventas
        $conexion = getDatabaseConnection();
        $stmtInsertVenta = $conexion->prepare("INSERT INTO ventas (id_cliente, id_pasarela, total_numero, total_pagado, fecha, estado, tipo_venta)
                                               VALUES (:id_cliente, :id_pasarela, :total_numero, :total_pagado, :fecha, :estado, :tipo_venta)");

        $estado = "AP";
        $tipo_venta = "VM"; 

        // Ejecutar la consulta para insertar la venta
        $stmtInsertVenta->bindParam(":id_cliente", $clienteId);
        $stmtInsertVenta->bindParam(":id_pasarela", $codigoTransaccion);
        $stmtInsertVenta->bindParam(":total_numero", $totalNumeros);
        $stmtInsertVenta->bindParam(":total_pagado", $totalPagar);
        $stmtInsertVenta->bindParam(":fecha", $fecha_venta);
        $stmtInsertVenta->bindParam(":estado", $estado);
        $stmtInsertVenta->bindParam(":tipo_venta", $tipo_venta);
        $stmtInsertVenta->execute();

        // Obtener el ID de la venta insertada
        $idVenta = $conexion->lastInsertId();


        // Insertar los números vendidos asociados a la venta
        if (!empty($numerosSeleccionados)) {
            insertarNumerosVendidos($idVenta, $numerosSeleccionados);
            actualizarEstadoNumeros($numerosSeleccionados);
            enviarCorreo($codigoTransaccion, $fecha_venta, $nombreCompleto, $totalPagar, $correo, $numerosSeleccionados);
        }

        // Cerrar la conexión
        $conexion = null;

        //echo "Los datos se han insertado correctamente en la base de datos.";
    } catch (PDOException $e) {
        // Manejar errores de PDO
        exit("Algo salió mal error: 003");
    }
} else {
    // Si no se envió el formulario por el método GET, podrías redirigir o mostrar un mensaje de error.
    //echo "No se recibieron datos del formulario.";
    exit("Algo salió mal error: 004");
}


function enviarCorreo($codigoTransaccion, $fecha_venta, $nombreCompleto, $totalPagar, $correo, $numerosSeleccionados) {

    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Cambiar al servidor SMTP que corresponda
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@caballosrevelo.com'; // Correo desde el que se enviará
        $mail->Password = 'CalidadServicioIngenieria2024*+-+'; // Contraseña del correo
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('contacto@caballosrevelo.com', 'Caballos Revelo');
        $mail->addAddress($correo);
        $mail->addBCC('contacto@caballosrevelo.com', 'Copia oculta');
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de Compra #' . $codigoTransaccion;

        // Contenido del correo
        ob_start();
        include '../../email/email.php'; // Incluye el contenido HTML del correo
        $body = ob_get_clean();

        // Reemplazar los placeholders con los valores dinámicos
        $body = str_replace('%CLIENTE%', $nombreCompleto, $body);
        $body = str_replace('%NUMERO_ORDEN%', $codigoTransaccion, $body);
        $body = str_replace('%FECHA%', $fecha_venta, $body);
        $body = str_replace('%TOTAL%', $totalPagar, $body);

        // Generar la lista de números de boleta dinámicamente
        $boletasHtml = '';
        foreach ($numerosSeleccionados as $numeroBoleta) {
            $boletasHtml .= '<li><span class="ticket-number">' . $numeroBoleta . '</span></li>';
        }
        $body = str_replace('%NUMEROS_BOLETAS%', $boletasHtml, $body);

        $mail->Body = $body;

        // Envío del correo
        $mail->send();
        //echo 'Correo enviado correctamente';
    } catch (Exception $e) {
        exit("Algo salió mal error: 005");
    }
}

// mostramos boleta ok
include '../../email/email-venta-manual.php';
