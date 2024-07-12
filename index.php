<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caballos Revelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="description" content="SORTEO HERMOSA YEGUA 😍 y DINERO EN EFECTIVO 🐴💵">
    <script src="js/main.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand" href="#hero">
                <img src="img/logo-sinbg.jpg" alt="Logo" class="navbar-logo">
            </a>
            <p class="text-center mt-4">🗓️ Juega este <b class="fecha">23 de agosto</b> con la lotería de Medellín</p>
            <!-- Botón de "Comprar" a la derecha -->
            <div class="text-center mt-4" id="cuenta">
            </div>
        </div>
    </nav>

    <div class="title_prin">
        <h2 class="text-center">SORTEO HERMOSA <span class="highlight">YEGUA</span> 😍 y DINERO EN EFECTIVO 🐴💵</h2>
    </div>


    <!-- Raffle Information Section -->
    <div class="container raffle-info text-center">

        <!-- Slider de Imágenes -->
        <div id="carouselExampleControls" class="carousel slide rounded-3 shadow-lg mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/2.jpeg" class="img-fluid" alt="Caballo 1">
                </div>
                <div class="carousel-item">
                    <img src="img/7.jpeg" class="img-fluid" alt="Caballo 2">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpeg" class="img-fluid" alt="Caballo 3">
                </div>
                <div class="carousel-item">
                    <img src="img/5.jpeg" class="img-fluid" alt="Caballo 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="premios">
            <p class="parrafo-premios">4 Premios</p>
        </div>


        <!-- Información de la Rifa -->
        <div class="raffle-info">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <!-- Primer Premio -->
                <div class="col">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Primer Premio</h5>
                            <p class="card-text">Yegua trochadora tres últimas cifras del premio mayor.</p>
                        </div>
                    </div>
                </div>
                <!-- Segundo Premio -->
                <div class="col">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Segundo Premio</h5>
                            <p class="card-text">$1.500.000 tres primeras cifras del premio mayor.</p>
                        </div>
                    </div>
                </div>
                <!-- Tercer Premio -->
                <div class="col">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tercer Premio</h5>
                            <p class="card-text">$1.000.000, tres últimas cifras invertida.</p>
                        </div>
                    </div>
                </div>
                <!-- Cuarto Premio -->
                <div class="col">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Cuarto Premio</h5>
                            <p class="card-text">$500.000 tres primeras cifras invertidas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- contenedor numeros -->
    <div class="container mt-5 available-numbers">
        <h2 class="parrafo-premios mb-2 pb-3" id="available">Números Disponibles por tan solo <i class="highlight">$35.000</i></h2>
        <div class="text-center m-4">
            <button type="button" id="btnDeseameSuerte" class="btn btn-success mb-3">Número aleatorio <i class="bi bi-arrow-clockwise"></i></button>
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
            <div id="payButton" class="pay-button text-center mt-2">
                Pagar
            </div>
        </div>

    </div>
    
    <!-- Modal de compra de boletos -->
    <div class="modal fade slide-in-left" id="buyTicketModal" tabindex="-1" aria-labelledby="buyTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyTicketModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="buyTicketForm" action="functions/mercadopago/pagar.php" method="POST">

                        <div class="grap">
                            <div class="d-flex flex-row">
                                <div class="mb-2 me-2">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>

                                <div class="mb-2">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-2">
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
                            <label for="celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" required>
                        </div>

                        <div class="mb-2">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
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

                        <button type="submit" class="btn btn-primary btn-block m-1 p-0 btn-pagar">PSE / Tarjeta Débito - Crédito<img src="img/pago.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer text-center mt-5">
        <p>&copy; 2024</p>
        <p><a href="#">Términos y Condiciones</a> | <a href="#">Política de Privacidad</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/departamentos.js"></script>
</body>

</html>