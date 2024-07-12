<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación AJAX con Fetch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .available-number {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sold-number {
            background-color: #f8d7da; /* Color de fondo para números vendidos */
            text-decoration: line-through; /* Línea sobre el número */
            color: #721c24; /* Color del texto para el estado vendido */
        }
    </style>
</head>
<body>
    <div class="container mt-5 available-numbers">
        <h2 class="parrafo-premios mb-2 pb-3" id="available">Números Disponibles</h2>
        <div class="d-flex flex-wrap justify-content-center" id="number-container">
            <!-- Números -->
        </div>

        <!-- Paginación -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Aquí se generará la paginación mediante AJAX -->
            </ul>
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentPage = 1;

            function loadNumbers(page) {
                fetch('load_numbers.php?page=' + page)
                    .then(response => response.json())
                    .then(data => {
                        const numberContainer = document.getElementById('number-container');
                        const pagination = document.getElementById('pagination');

                        // Limpiar contenedores
                        numberContainer.innerHTML = '';
                        pagination.innerHTML = '';

                        // Mostrar números
                        data.numbers.forEach(number => {
                            const numberDiv = document.createElement('div');
                            numberDiv.className = number.estado === 'vendido' ? 'number sold-number' : 'number available-number';
                            numberDiv.textContent = number.numero;
                            numberContainer.appendChild(numberDiv);
                        });

                        // Generar paginación
                        // Anterior
                        const prevLi = document.createElement('li');
                        prevLi.className = 'page-item ' + (data.currentPage <= 1 ? 'disabled' : '');
                        const prevA = document.createElement('a');
                        prevA.className = 'page-link';
                        prevA.href = '#';
                        prevA.textContent = 'Anterior';
                        prevA.addEventListener('click', function (e) {
                            e.preventDefault();
                            if (data.currentPage > 1) {
                                loadNumbers(data.currentPage - 1);
                            }
                        });
                        prevLi.appendChild(prevA);
                        pagination.appendChild(prevLi);

                        // Siguiente
                        const nextLi = document.createElement('li');
                        nextLi.className = 'page-item ' + (data.currentPage >= data.totalPages ? 'disabled' : '');
                        const nextA = document.createElement('a');
                        nextA.className = 'page-link';
                        nextA.href = '#';
                        nextA.textContent = 'Siguiente';
                        nextA.addEventListener('click', function (e) {
                            e.preventDefault();
                            if (data.currentPage < data.totalPages) {
                                loadNumbers(data.currentPage + 1);
                            }
                        });
                        nextLi.appendChild(nextA);
                        pagination.appendChild(nextLi);
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Cargar números y paginación inicialmente
            loadNumbers(currentPage);
        });
    </script>
</body>
</html>
