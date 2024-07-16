<!-- incluimos elheader -->
<?php include 'header.php';

// Incluir el archivo de modelo
include '../funciones/query-general.php';

// Ejemplo de uso
$clientes = obtenerClientes();

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include_once 'nav.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mis Clientes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="clientes" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>correo</th>
                                    <th>Depto</th>
                                    <th>Ciudad</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($clientes as $cliente) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['nombre_cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['celular_cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['correo_cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['departamento_cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['ciudad_cliente']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; </span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    <!-- incluimos elheader -->
    <?php include 'footer.php' ?>