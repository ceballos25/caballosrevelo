<?php
// Habilitar visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('America/Bogota');

// Generar un token único
$token = bin2hex(random_bytes(16));
$_SESSION['transaction_token'] = $token;
$_SESSION['transaction_id'] = $codigoTransaccion; 

// Incluir el archivo de configuración de la base de datos y Mercado Pago SDK
require_once '../../vendor/autoload.php';
require_once '../../config/Database.php'; // Asegúrate de tener el archivo con la función getDatabaseConnection()

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


// Función para guardar la transacción y los números en la base de datos
function guardarTransaccionYNumeros($codigoTransaccion, $numerosSeleccionados)
{
    try {
        $pdo = getDatabaseConnection();

        // Preparar la consulta para insertar cada número seleccionado
        $stmt = $pdo->prepare("INSERT INTO transacciones_numeros (codigo_transaccion, numero_seleccionado) VALUES (:codigoTransaccion, :numeroSeleccionado)");

        // Recorrer cada número seleccionado y ejecutar la consulta preparada
        foreach ($numerosSeleccionados as $numero) {
            // Ejecutar la consulta preparada para cada número
            $stmt->execute([
                ':codigoTransaccion' => $codigoTransaccion,
                ':numeroSeleccionado' => $numero,
            ]);
        }
    } catch (PDOException $e) {
        // Manejar errores de base de datos
        throw new Exception('Error al guardar la transacción y los números: ' . $e->getMessage());
    }
}

// Verificar si se ha enviado el formulario usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y obtener los datos del formulario
    $nombre = sanitizeInput($_POST["nombre"]);
    $apellido = sanitizeInput($_POST["apellido"]);
    $departamento = sanitizeInput($_POST["departamento"]);
    $ciudad = sanitizeInput($_POST["ciudad"]);
    $celular = sanitizeInput($_POST["celular"]);
    $correo = $_POST["correo"];
    $totalAPagar = sanitizeInput($_POST["totalPagar"]);
    $totalNumeros = sanitizeInput($_POST["totalNumeros"]);
    $numerosSeleccionados = isset($_POST['numerosSeleccionados']) ? json_decode($_POST['numerosSeleccionados']) : [];
    // Convertir el array a un array indexado para asegurar que solo tengamos números y sin espacios en blanco
    $numerosSeleccionados = array_values(array_filter($numerosSeleccionados, 'is_numeric'));
    // Codificar el array en JSON
    $numerosSeleccionadosJson = json_encode($numerosSeleccionados);

    // Obtener la fecha y hora actual en el formato MySQL
    $fecha_venta = date('Y-m-d H:i:s');
    $nombreCompleto = $nombre . ' ' . $apellido;

    // Generar un código único de transacción (aquí puedes usar una lógica específica para generar este código)
    $codigoTransaccion = uniqid();

    // Guardar la transacción y los números en la base de datos
    guardarTransaccionYNumeros($codigoTransaccion, $numerosSeleccionados);

} else {
    // Si no se envió el formulario por el método POST, mostrar un mensaje de error y salir
    echo "No se recibieron datos del formulario.";
    exit();
}

// Establecer el Access Token de Mercado Pago
MercadoPago\SDK::setAccessToken("APP_USR-3036319224447166-070917-70a8a1acfc645c08769849f0619574b6-1736789621");

// Crear una preferencia de pago
$preference = new MercadoPago\Preference();

// Crear un artículo para la preferencia
$item = new MercadoPago\Item();
$item->title = 'Producto';
$item->quantity = 1;
$item->unit_price = $totalAPagar; // Utiliza el total a pagar recibido del formulario

// Agregar el artículo a la preferencia
$preference->items = array($item);

// Agregar los datos del comprador
$payer = new MercadoPago\Payer();
$payer->first_name = $nombre; // Asigna el nombre
$payer->last_name = $apellido; // Asigna el apellido
$payer->email = $correo; // Asigna el correo electrónico
$payer->phone = $celular;

// Asignar el código único de transacción como external_reference
$preference->external_reference = $codigoTransaccion;

// Configurar métodos de pago excluidos
$preference->payment_methods = array(
    "excluded_payment_types" => array(
        array("id" => "ticket")
    ),
    "excluded_payment_methods" => array(
        array("id" => "cash"),
        array("id" => "atm"),
        array("id" => "bank_transfer")
    )
);

// URL base de tu aplicación
$base_url = "https://localhost/caballosrevelo/functions/mercadopago/";

// URL de redirección de éxito
$redirect_url_success = $base_url . "pay-success.php";

// Agregar los datos del formulario a la URL de redirección de éxito
$redirect_url_success .= '?nombre=' . urlencode($nombreCompleto);
$redirect_url_success .= '&correo=' . urlencode($correo);
$redirect_url_success .= '&celular=' . urlencode($celular);
$redirect_url_success .= '&departamento=' . urlencode($departamento);
$redirect_url_success .= '&ciudad=' . urlencode($ciudad);
$redirect_url_success .= '&totalNumeros=' . urlencode($totalNumeros);
$redirect_url_success .= '&totalPagar=' . urlencode($totalAPagar);
$redirect_url_success .= '&external_reference_codigo_transaccion=' . urlencode($codigoTransaccion);
$redirect_url_success .= '&token=' . urlencode($token);

// Definir las URLs de redirección en el array back_urls
$preference->back_urls = array(
    "success" => $redirect_url_success, // Página a la que se redirigirá si la transacción es exitosa
    "failure" => $base_url . "pay-error.php", // Página a la que se redirigirá si la transacción falla
    "pending" => $base_url . "pay-pending.php" // Página a la que se redirigirá si la transacción está pendiente
);

// Configurar retorno automático al usuario
$preference->auto_return = "approved";

// Guardar la preferencia en Mercado Pago
try {
    $preference->save();
} catch (Exception $e) {
    echo 'Error al guardar la preferencia: ' . $e->getMessage();
    exit();
}

// Redirigir al usuario a la página de pago de Mercado Pago
header('Location: ' . $preference->sandbox_init_point); // Utiliza sandbox_init_point si estás en modo de pruebas
exit();

