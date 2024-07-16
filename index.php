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
    <link rel="stylesheet" href="css/style-v1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="description" content="SORTEO HERMOSA YEGUA 😍 y DINERO EN EFECTIVO 🐴💵">
    <script src="js/main-v2.js"></script>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
</head>

<body>

    <!-- whatsapp -->
    <div class="btn-whatsapp">
        <a href="https://wa.link/csk5f6" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39">
                <path fill="#00E676" d="M10.7 32.8l.6.3c2.5 1.5 5.3 2.2 8.1 2.2 8.8 0 16-7.2 16-16 0-4.2-1.7-8.3-4.7-11.3s-7-4.7-11.3-4.7c-8.8 0-16 7.2-15.9 16.1 0 3 .9 5.9 2.4 8.4l.4.6-1.6 5.9 6-1.5z">
                </path>
                <path fill="#FFF" d="M32.4 6.4C29 2.9 24.3 1 19.5 1 9.3 1 1.1 9.3 1.2 19.4c0 3.2.9 6.3 2.4 9.1L1 38l9.7-2.5c2.7 1.5 5.7 2.2 8.7 2.2 10.1 0 18.3-8.3 18.3-18.4 0-4.9-1.9-9.5-5.3-12.9zM19.5 34.6c-2.7 0-5.4-.7-7.7-2.1l-.6-.3-5.8 1.5L6.9 28l-.4-.6c-4.4-7.1-2.3-16.5 4.9-20.9s16.5-2.3 20.9 4.9 2.3 16.5-4.9 20.9c-2.3 1.5-5.1 2.3-7.9 2.3zm8.8-11.1l-1.1-.5s-1.6-.7-2.6-1.2c-.1 0-.2-.1-.3-.1-.3 0-.5.1-.7.2 0 0-.1.1-1.5 1.7-.1.2-.3.3-.5.3h-.1c-.1 0-.3-.1-.4-.2l-.5-.2c-1.1-.5-2.1-1.1-2.9-1.9-.2-.2-.5-.4-.7-.6-.7-.7-1.4-1.5-1.9-2.4l-.1-.2c-.1-.1-.1-.2-.2-.4 0-.2 0-.4.1-.5 0 0 .4-.5.7-.8.2-.2.3-.5.5-.7.2-.3.3-.7.2-1-.1-.5-1.3-3.2-1.6-3.8-.2-.3-.4-.4-.7-.5h-1.1c-.2 0-.4.1-.6.1l-.1.1c-.2.1-.4.3-.6.4-.2.2-.3.4-.5.6-.7.9-1.1 2-1.1 3.1 0 .8.2 1.6.5 2.3l.1.3c.9 1.9 2.1 3.6 3.7 5.1l.4.4c.3.3.6.5.8.8 2.1 1.8 4.5 3.1 7.2 3.8.3.1.7.1 1 .2h1c.5 0 1.1-.2 1.5-.4.3-.2.5-.2.7-.4l.2-.2c.2-.2.4-.3.6-.5s.4-.4.5-.6c.2-.4.3-.9.4-1.4v-.7s-.1-.1-.3-.2z">
                </path>
            </svg> </a>
    </div>

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
                    <img src="img/7.jpeg" class="img-fluid" alt="Trochadora">
                </div>
                <div class="carousel-item">
                    <img src="img/6.jpeg" class="img-fluid" alt="Hermosa Yegua">
                </div>
                <div class="carousel-item">
                    <img src="img/img2.jpeg" class="img-fluid" alt="Hermosa Yegua">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpeg" class="img-fluid" alt="4 premios">
                </div>
                <div class="carousel-item">
                    <img src="img/img1.jpeg" class="img-fluid" alt="Con las 3 Cifras de la de medellin">
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

        <div class="text-center">
            <button type="button" id="btnDeseameSuerte" class="btn btn-success mb-3"><i class="bi bi-arrow-clockwise">Número aleatorio</i></button>
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
            <div id="payButton" class="pay-button text-center mt-2">
                Ver mi carrito
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
                                    <input type="text" class="form-control text-capitalize" id="nombre" name="nombre" required>
                                </div>

                                <div class="mb-2">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control text-capitalize" id="apellido" name="apellido" required>
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
                            <input type="number" class="form-control" id="celular" name="celular" required>
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

                        <button type="submit" class="btn btn-primary btn-block m-1 p-0 btn-pagar irPagar check-reserved-numbers">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="btn-text">PSE / Tarjeta Débito - Crédito</span>
                            <img src="img/pago.png" alt="">
                        </button>


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