<!-- incluimos elheader -->
<?php include 'header.php';

// Incluir el archivo de modelo
include '../funciones/query-general.php';

// Ejemplo de uso
$detalleVentas = obtenerDetalleVentas();

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
                    <h6 class="m-0 font-weight-bold text-primary">Detalle de Ventas</h6>
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
                                    <th>Ttal números</th>
                                    <th>Total Cobro</th>
                                    <th>Fecha</th>
                                    <th>Tipo Venta</th>
                                    <th>Id Pasarela</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($detalleVentas as $detalleVenta) : ?>
                                    <tr>
                                        <td><?php echo $detalleVenta['id_venta']; ?></td>
                                        <td><?php echo $detalleVenta['nombre_cliente']; ?></td>
                                        <td><?php echo $detalleVenta['celular_cliente']; ?></td>
                                        <td><?php echo $detalleVenta['correo_cliente']; ?></td>
                                        <td><?php echo $detalleVenta['departamento_cliente']; ?></td>
                                        <td><?php echo $detalleVenta['ciudad_cliente']; ?></td>
                                        <td><?php echo $detalleVenta['total_numero']; ?></td>
                                        <td><?php echo '$' . number_format(floatval($detalleVenta["total_pagado"]), 0, ',', '.'); ?></td>
                                        <td><?php echo date("d/m/Y h:i A", strtotime($detalleVenta["fecha"])); ?></td>
                                        <td>
                                            <?php if ($detalleVenta['tipo_venta'] == 'PW') : ?>
                                                <span class="badge badge-primary">Página Web</span>
                                            <?php elseif ($detalleVenta['tipo_venta'] == 'VM') : ?>
                                                <span class="badge badge-success">Venta Manual</span>
                                            <?php else : ?>
                                                <span class="badge badge-default"><?php echo $detalleVenta['tipo_venta']; ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo $detalleVenta['id_pasarela']; ?></td>
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