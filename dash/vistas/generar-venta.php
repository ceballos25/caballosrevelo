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
                    <h6 class="m-0 font-weight-bold text-primary">Generar Venta</h6>
                </div>
                <div class="text-center m-4">
                    <button type="button" id="btnDeseameSuerte" class="btn btn-success mb-3">Número aleatorio <i class="bi bi-arrow-clockwise"></i></button>
                </div>

                <!-- Estados -->
                <div class="status-container">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div class="status-item">
                            <span class="disponible"></span>
                            <p class="text-muted mb-0">Disponible</p>
                        </div>
                        <div class="status-item">
                            <span class="reservado">X</span>
                            <p class="text-muted mb-0">Reservado</p>
                        </div>
                        <div class="status-item">
                            <span class="vendido">X</span>
                            <p class="text-muted mb-0">Vendido</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center" id="number-container">
                    <!-- Números -->
                </div>

                <!-- Paginación -->
                <nav aria-label="Page navigation">
                    <ul class="pagination" style="justify-content: space-between;" id="pagination">
                        <!-- Aquí se generará la paginación mediante AJAX -->
                    </ul>
                </nav>

                <div class="d-flex justify-content-center align-items-center">
                    <div id="payButton" class="btn btn-success mb-3">
                        Finalizar Venta
                    </div>
                </div>
            </div>

            <!-- Modal de compra de boletos -->
            <div class="modal fade slide-in-left" id="buyTicketModal" tabindex="-1" aria-labelledby="buyTicketModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buyTicketModalLabel"></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="buyTicketForm" action="../funciones/venta-manual.php" method="POST">

                                <div class="mb-2">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="number" class="form-control" id="celular" name="celular" required>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="mb-2">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control text-capitalize" id="nombre" name="nombre" required>
                                    </div>

                                    <div class="mb-2">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control text-capitalize" id="apellido" name="apellido" required>
                                    </div>
                                </div>


                                <div class="row mb-2 d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <label for="departamento" class="form-label">Departamento</label>
                                        <select class="custom-select form-control d-flex" id="usp-custom-departamento-de-residencia" name="departamento" required>
                                            <option value=""></option>
                                            <option value="Antioquia">Antioquia</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Arauca">Arauca</option>
                                            <option value="Atlantico">atlantico</option>
                                            <option value="Bolivar">Bolivar</option>
                                            <option value="Boyaca">Boyaca</option>
                                            <option value="Caldas">Caldas</option>
                                            <option value="Caqueta">Caqueta</option>
                                            <option value="Casanare">Casanare</option>
                                            <option value="Cauca">Cauca</option>
                                            <option value="Cesar">Cesar</option>
                                            <option value="Choco">Choco</option>
                                            <option value="Cordoba">Cordoba</option>
                                            <option value="Cundinamarca">Cundinamarca</option>
                                            <option value="Guainia">Guainia</option>
                                            <option value="Guaviare">Guaviare</option>
                                            <option value="Huila">Huila</option>
                                            <option value="La Guajira">La Guajira</option>
                                            <option value="Magdalena">Magdalena</option>
                                            <option value="Meta">Meta</option>
                                            <option value="Nariño">Nariño</option>
                                            <option value="Norte de Santander">Norte de Santander</option>
                                            <option value="Putumayo">Putumayo</option>
                                            <option value="Quindio">Quindio</option>
                                            <option value="Risaralda">Risaralda</option>
                                            <option value="San Andres y Providencia">San Andres y Providencia</option>
                                            <option value="Santander">Santander</option>
                                            <option value="Sucre">Sucre</option>
                                            <option value="Tolima">Tolima</option>
                                            <option value="Valle del Cauca">Valle del Cauca</option>
                                            <option value="Vaupes">Vaupes</option>
                                            <option value="Vichada">Vichada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <select class="custom-select form-control" id="usp-custom-municipio-ciudad" name="ciudad" required>
                                            <option value="" disabled selected>Seleccionar..</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo" required value="contacto@caballosrevelo.com">
                                </div>

                                <div class="grap">
                                    <div class="mb-2">
                                        <label for="tickets" class="form-label">Tus números:</label>
                                        <div id="ticketNumber"></div>
                                    </div>

                                    <!-- Campo oculto para almacenar los números seleccionados -->
                                    <input type="hidden" id="numerosSeleccionados" name="numerosSeleccionados">

                                    <div class="text-center mb-2">
                                        <label for="totalPagar" class="form-label">Total a pagar:</label>
                                        <input class="form-control totalPagar w-50 mx-auto" id="totalPagar" name="totalPagar" type="text" readonly>
                                        <input class="" id="totalNumeros" name="totalNumeros" type="hidden">
                                    </div>
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