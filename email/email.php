<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Venta de Boletas</title>
    <style>
        /* Estilos generales para el correo electrónico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #FDFDFD;
            /* Color de fondo más suave */
        }

        .container {
            width: 100%;
            max-width: 600px;
            /* Ancho máximo del contenido */
            margin: 0 auto;
            /* Centrado horizontal */
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            /* Esquinas redondeadas */
            box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
        }

        .header {
            text-align: center;
            font-size: 28px;
            /* Tamaño de fuente más grande */
            margin-bottom: 20px;
            padding: 8px;
        }


        .content {
            margin-top: 5px;
            padding: 18px;
            border: 3px solid #000;
            border-radius: 3%;
            margin-bottom: 20px;
            border-style: dotted;
        }

        .content h2 {
            font-size: 18px;
            /* Tamaño de fuente para los títulos */
            margin-bottom: 10px;
        }

        .content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .content ul li {
            margin-bottom: 10px;
        }

        .ticket-number {
            display: inline-block;
            background-color: #00b34b;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            padding: 10px 10px;
            border-radius: 50%;
            /* Bordes redondeados */
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 16px;
            /* Tamaño de fuente para el pie de página */
            color: #e55b00;
            /* Color de texto naranja oscuro */
            background-color: #FFFFFF;
            border-top: 1px solid #CCCCCC;
            border-radius: 0 0 10px 10px;
            /* Esquinas redondeadas solo en la parte inferior */
        }

        .social-links {
            text-align: center;
            margin-top: 10px;
        }

        .social-links a {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background-color: #FF6700;
            /* Color de fondo naranja */
            color: #FFFFFF;
            font-size: 18px;
            border-radius: 50%;
            /* Botones redondos */
            margin: 0 5px;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: scale(1.2);
            /* Efecto de escala al pasar el mouse */
        }

        /* Estilo para el botón de regresar */
        .btn-regresar {
            display: flex;
            padding: 10px 20px;
            margin-top: 20px;
            /* Tamaño del botón */
            font-size: 16px;
            /* Tamaño del texto */
            font-weight: 600;
            /* Grosor del texto */
            color: #fff;
            /* Color del texto */
            background-color: #e55b00;
            /* Color de fondo */
            border: 1px solid #e55b00;
            /* Borde del botón */
            border-radius: 5px;
            /* Esquinas redondeadas */
            text-align: center;
            /* Centrar el texto */
            text-decoration: none;
            /* Eliminar el subrayado */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            transition: all 0.3s ease;
            /* Transición suave para efectos */
            justify-content: center;
        }

        .btn-regresar:hover {
            background-color: #e55b01;
            /* Color de fondo en hover */
            border-color: #e55b01;
            /* Color del borde en hover */
            color: #fff;
            /* Color del texto en hover */
            text-decoration: none;
            /* Asegura que el texto no esté subrayado en hover */
        }

        .btn-regresar:focus {
            outline: none;
            /* Quitar el contorno por defecto del botón */
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
            /* Resaltar el botón al hacer foco */
        }

        .btn-regresar:active {
            background-color: #004080;
            /* Color de fondo cuando se hace clic */
            border-color: #004080;
            /* Color del borde cuando se hace clic */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Efecto de clic */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            Confirmación de Venta
        </div>


        <div class="content">
            <h2>Detalles de la Transacción:</h2>
            <ul>
                <li><strong>Cliente:</strong> <?php echo $nombreCompleto; ?></li>
                <li><strong>Número de Orden:</strong> <?php echo $codigoTransaccion; ?></li>
                <li><strong>Fecha:</strong> <?php echo date('d-m-Y h:i:s a', strtotime($fecha_venta)); ?></li>
                <li><strong>Total:</strong> <?php echo '$' . number_format($totalPagar, 0, ',', '.'); ?></li>
            </ul>
            <h2>Tus números:</h2>
            <ul>
                <?php foreach ($numerosSeleccionados as $numeroBoleta) : ?>
                    <span style="margin: 10px;" class="ticket-number"><?php echo $numeroBoleta; ?></span>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer">
            ¡Gracias por tu compra!
        </div>
        <div class="social-links">
            <a href="#" target="_blank" title="Facebook"><img src="https://caballosrevelo.com/img/facebook.png" width="30" alt="logo facebook"></a>
            <a href="https://chat.whatsapp.com/EJS1kVlSPfH68WZncA4Lgi" target="_blank" title="Grupo Informacion"><img src="https://caballosrevelo.com/img/whatsapp.png" width="30" alt="logo whatsapp"></a>
            <a href="#" target="_blank" title="Instagram"><img src="https://caballosrevelo.com/img/social.png" width="30" alt="logo instagram"></a>
        </div>
    </div>
</body>

</html>