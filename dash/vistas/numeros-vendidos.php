<!-- incluimos elheader -->
<?php include 'header.php';

// Incluir el archivo de modelo
include '../funciones/query-general.php';

// Ejemplo de uso
$numerosVendidos = obtenerNumerosVendidos();

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
                    <h6 class="m-0 font-weight-bold text-primary">Números Vendidos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="numeros" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id Venta</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>Ciudad</th>
                                    <th>Tipo Venta</th>
                                    <th>Fecha</th>
                                    <th>Número</th>
                                </tr>
                            </thead>
                            <?php foreach ($numerosVendidos as $numerosVendido) : ?>
                                    <tr>
                                        <td><?php echo $numerosVendido['id_venta']; ?></td>
                                        <td><?php echo $numerosVendido['nombre_cliente']; ?></td>
                                        <td><?php echo $numerosVendido['celular_cliente']; ?></td>
                                        <td><?php echo $numerosVendido['ciudad_cliente']; ?></td>
                                        <td>
                                            <?php if ($numerosVendido['tipo_venta'] == 'PW') : ?>
                                                <span class="badge badge-primary">Página Web</span>
                                            <?php elseif ($numerosVendido['tipo_venta'] == 'VM') : ?>
                                                <span class="badge badge-success">Venta Manual</span>
                                            <?php else : ?>
                                                <span class="badge badge-default"><?php echo $numerosVendido['tipo_venta']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo date("d/m/Y h:i A", strtotime($numerosVendido["fecha"])); ?></td>

                                        <td><?php echo $numerosVendido['numero']; ?></td>
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