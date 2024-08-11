<!-- incluimos elheader -->
<?php include 'header.php';
include '../funciones/query-general.php';
$numerosRespaldos = obtenerRespaldo();
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
                    <h6 class="m-0 font-weight-bold text-primary">Respaldo</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="numeros" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo Transaccion</th>
                                    <th>Número Seleccionado</th>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>correo</th>
                                    <th>Departamento</th>
                                    <th>Ciudad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <?php foreach ($numerosRespaldos as $numeroRespaldo) : ?>
                                <tr>
                                    <td><?php echo $numeroRespaldo['id']; ?></td>
                                    <td><?php echo $numeroRespaldo['codigo_transaccion']; ?></td>
                                    <td><?php echo $numeroRespaldo['numero_seleccionado']; ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($numeroRespaldo['fecha_registro'])); ?></td>
                                    <td><?php echo $numeroRespaldo['nombre']; ?></td>
                                    <td><?php echo $numeroRespaldo['celular']; ?></td>
                                    <td><?php echo $numeroRespaldo['correo']; ?></td>
                                    <td><?php echo $numeroRespaldo['departamento']; ?></td>
                                    <td><?php echo $numeroRespaldo['ciudad']; ?></td>

                                    <td>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#buyTicketModalRespaldo"
                                                data-id="<?php echo $numeroRespaldo['id']; ?>"
                                                data-codigo="<?php echo $numeroRespaldo['codigo_transaccion']; ?>"
                                                data-fecha="<?php echo $numeroRespaldo['fecha_registro']; ?>"
                                                data-nombre="<?php echo $numeroRespaldo['nombre']; ?>"
                                                data-celular="<?php echo $numeroRespaldo['celular']; ?>"
                                                data-correo="<?php echo $numeroRespaldo['correo']; ?>"
                                                data-departamento="<?php echo $numeroRespaldo['departamento']; ?>"
                                                data-ciudad="<?php echo $numeroRespaldo['ciudad']; ?>">
                                            Forzar Venta
                                        </button>
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

        <!-- Modal de compra de boletos Respaldo -->
        <div class="modal fade slide-in-left" id="buyTicketModalRespaldo" tabindex="-1" aria-labelledby="buyTicketModalLabelRespaldo" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buyTicketModalLabelRespaldo"></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="buyTicketForm" action="../funciones/forzar-venta.php" method="POST">
                            <input type="hidden" id="id_transaccion" name="id_transaccion">
                            <div class="mb-2">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="number" class="form-control" id="celular" name="celular" required>
                            </div>
                                <div class="mb-2">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control text-capitalize" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-2">
                                    <label for="nombre" class="form-label">Departamento</label>
                                    <input type="text" class="form-control text-capitalize" id="departamento" name="departamento" required>
                            </div>
                            <div class="mb-2">
                                    <label for="nombre" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control text-capitalize" id="ciudad" name="ciudad" required>
                            </div>
                            <div class="mb-2">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block m-1 p-2 btn-pagar">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                <span class="btn-text">Generar Venta</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <?php include 'footer.php' ?>
</div>