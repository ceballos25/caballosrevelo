<!-- incluimos elheader -->
<?php include 'header.php';

// Incluir el archivo de modelo
include '../funciones/query-general.php';

// Ejemplo de uso
$numeros = obtenerNumeros();

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
                    <h6 class="m-0 font-weight-bold text-primary">Números</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="numeros" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <?php foreach ($numeros as $numero) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($numero['numero_disponible']); ?></td>
                                    <td>
                                        <?php if ($numero['vendido'] == 'x') : ?>
                                            <span class="badge badge-success">Vendido</span>
                                        <?php elseif ($numero['vendido'] == 'p') : ?>
                                            <span class="badge badge-warning">Reservado</span>
                                        <?php else : ?>
                                            <span class="badge badge-info">Disponible</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <tbody>

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