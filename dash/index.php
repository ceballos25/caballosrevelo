<?php
session_start();
require '../config/database.php'; // Asegúrate de incluir el archivo con la función getDatabaseConnection

// Inicializar variables para mostrar mensajes
$login_error = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y limpiar los datos de entrada
    $usuario = htmlspecialchars(trim($_POST['usuario']), ENT_QUOTES, 'UTF-8');
    $contrasena = trim($_POST['contrasena']); // La contraseña no se muestra directamente, solo se utiliza para validación


    try {
        $pdo = getDatabaseConnection();

        // Preparar la consulta para buscar al usuario
        $stmt = $pdo->prepare('SELECT id_usuario, usuario, contrasena FROM usuarios WHERE usuario = :usuario');
        $stmt->execute(['usuario' => $usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && password_verify($contrasena, $user['contrasena'])) {
            // Credenciales válidas
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['usuario'];
            header('Location: vistas/principal.php'); // Redirigir al usuario al área protegida
            exit;
        } else {
            // Credenciales inválidas
            $login_error = 'Usuario o contraseña incorrectos';
        }
    } catch (Exception $e) {
        //$login_error = 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="img/ico-azul.ico" type="image/x-icon">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <!-- Imagen de Login -->
                            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center bg-login-image">
                                <img src="../img/logo-sinbg.jpg" class="img-fluid" width="60%" alt="Img-login">
                            </div>

                            <!-- Formulario de Login -->
                            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="p-5 w-100">
                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenid@</h1>
                                    </div>
                                    <!-- Formulario con acción en el mismo archivo -->
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="usuario" name="usuario" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                        </button>
                                        <?php if ($login_error): ?>
                                            <div class="alert alert-danger mt-2">
                                                <?php echo htmlspecialchars($login_error); ?>
                                            </div>
                                        <?php endif; ?>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
