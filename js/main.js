document.addEventListener('DOMContentLoaded', function () {
    let currentPage = 1; // Variable para almacenar la página actual de la paginación
    let selectedNumbers = []; // Array para almacenar los números seleccionados

    // Función para cargar los números y la paginación para la página especificada
    function loadNumbers(page) {
        // Realizar una solicitud fetch para obtener los números de la página específica desde el servidor
        fetch('functions/load_numbers.php?page=' + page)
        .then(response => response.json()) // Convertir la respuesta a JSON
        .then(data => {
            const numberContainer = document.getElementById('number-container'); // Contenedor donde se mostrarán los números
            const pagination = document.getElementById('pagination'); // Contenedor de la paginación
    
            // Limpiar los contenedores antes de cargar nuevos números y paginación
            numberContainer.innerHTML = '';
            pagination.innerHTML = '';
    
            // Iterar sobre cada número obtenido de la respuesta JSON
            data.numbers.forEach(number => {
                const numberDiv = document.createElement('div'); // Crear un nuevo div para cada número
                
                // Asignar clases dependiendo del estado del número (vendido o disponible)
                if (number.vendido === 'x') {
                    numberDiv.className = 'number available-number sold-number';
                } else {
                    numberDiv.className = 'number available-number';
                }
                
                numberDiv.textContent = number.numero_disponible; // Establecer el texto del div como el número
    
                // Marcar el número como seleccionado si está en el array de números seleccionados
                if (selectedNumbers.includes(number.numero_disponible)) {
                    numberDiv.classList.add('selected-number');
                }
    
                // Agregar un evento click para seleccionar/deseleccionar el número
                if (number.vendido !== 'x') {
                    numberDiv.addEventListener('click', function () {
                        if (selectedNumbers.includes(number.numero_disponible)) {
                            // Si el número ya está seleccionado, quitarlo del array
                            const index = selectedNumbers.indexOf(number.numero_disponible);
                            selectedNumbers.splice(index, 1);
                            numberDiv.classList.remove('selected-number'); // Quitar la clase de seleccionado visualmente
                        } else {
                            // Si el número no está seleccionado, agregarlo al array
                            selectedNumbers.push(number.numero_disponible);
                            numberDiv.classList.add('selected-number'); // Agregar la clase de seleccionado visualmente
                        }
                    });
                }
    
                numberContainer.appendChild(numberDiv); // Agregar el div del número al contenedor
            });
        
                

                // Generar botón de paginación 'Atrás'
                const prevLi = document.createElement('li');
                prevLi.className = '' + (data.currentPage <= 1 ? 'disabled' : ''); // Deshabilitar el botón si es la primera página
                const prevA = document.createElement('a');
                prevA.className = 'page-link';
                prevA.href = '#';
                prevA.textContent = 'Atrás';
                prevA.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevenir comportamiento predeterminado del enlace
                    if (data.currentPage > 1) {
                        currentPage--; // Decrementar la página actual
                        loadNumbers(currentPage); // Cargar números para la página anterior
                    }
                });
                prevLi.appendChild(prevA);
                pagination.appendChild(prevLi); // Agregar el botón 'Atrás' a la paginación

                // Generar botón de paginación 'Siguiente'
                const nextLi = document.createElement('li');
                nextLi.className = '' + (data.currentPage >= data.totalPages ? 'disabled' : ''); // Deshabilitar el botón si es la última página
                const nextA = document.createElement('a');
                nextA.className = 'page-link';
                nextA.href = '#';
                nextA.textContent = 'Siguiente';
                nextA.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevenir comportamiento predeterminado del enlace
                    if (data.currentPage < data.totalPages) {
                        currentPage++; // Incrementar la página actual
                        loadNumbers(currentPage); // Cargar números para la página siguiente
                    }
                });
                nextLi.appendChild(nextA);
                pagination.appendChild(nextLi); // Agregar el botón 'Siguiente' a la paginación
            })
            .catch(error => console.error('Error:', error)); // Capturar y registrar errores en la consola si hay problemas con la solicitud fetch
    }

    // Función para mostrar el modal con los números seleccionados
    function showPaymentModal() {
        // Obtener el cuerpo del modal donde se mostrarán los números seleccionados
        const modalBody = document.querySelector('#buyTicketModal .modal-body');
        const ticketNumbersDiv = modalBody.querySelector('#ticketNumber'); // Div donde se mostrarán los números

        ticketNumbersDiv.innerHTML = ''; // Limpiar contenido anterior dentro del div de números

        // Mostrar cada número seleccionado como un div con las clases adecuadas
        selectedNumbers.forEach(numero => {
            const numberDiv = document.createElement('div');
            numberDiv.className = 'number available-number selected-number'; // Clases para el estilo visual del número
            numberDiv.textContent = numero; // Texto dentro del div del número
            ticketNumbersDiv.appendChild(numberDiv); // Agregar el div del número al contenedor dentro del modal
        });

        // Mostrar el modal después de haber configurado todos los números seleccionados
        const buyTicketModal = new bootstrap.Modal(document.getElementById('buyTicketModal'));
        buyTicketModal.show();
    }

    // Llamar a loadNumbers inicialmente para cargar la primera página
    loadNumbers(currentPage);

    // Esperar a que el botón de pagar esté disponible y manejar su evento de clic
    const payButton = document.getElementById('payButton');
    payButton.addEventListener('click', function () {
        if (selectedNumbers.length === 0) {
            alert('Debe seleccionar al menos un número antes de continuar.'); // Alerta si no se ha seleccionado ningún número
        } else {
            showPaymentModal(); // Mostrar el modal con los números seleccionados cuando se hace clic en el botón de pagar
            totalPagar(); // Actualizar el total a pagar en el modal
            const valueTotalNumeros = document.querySelectorAll('#ticketNumber .selected-number').length;

            // Mostrar la cantidad de números en el input
            const contenidoValueNumeros = document.getElementById('totalNumeros');
            contenidoValueNumeros.value = valueTotalNumeros;  // Usar .value en lugar de .innerText para un <input> o <textarea>
    
        }
    });

    // Manejar el evento de clic en el botón de paginación ('Atrás' o 'Siguiente')
    document.getElementById('pagination').addEventListener('click', function (e) {
        if (e.target.textContent === '⬅ Atrás') {
            if (currentPage > 1) {
                currentPage--; // Decrementar la página actual si se hace clic en 'Atrás'
                loadNumbers(currentPage); // Cargar números para la página anterior
            }
        } else if (e.target.textContent === 'Siguiente ➡') {
            if (currentPage < data.totalPages) {
                currentPage++; // Incrementar la página actual si se hace clic en 'Siguiente'
                loadNumbers(currentPage); // Cargar números para la página siguiente
            }
        }
    });

    // Función para actualizar el total a pagar en el modal de selección de números
    function totalPagar() {
        const selectedNumberDivs = document.querySelectorAll('#ticketNumber .selected-number');
        const selectedNumbersArray = Array.from(selectedNumberDivs).map(div => div.textContent.trim());

        // Mostrar el total a pagar en el input
        const pagarInput = document.getElementById('totalPagar');
        pagarInput.value = `$ ${calculateTotal(selectedNumbersArray).toLocaleString('es-ES')}`;

        // Actualizar el campo oculto con los números seleccionados
        const selectedNumbersInput = document.getElementById('numerosSeleccionados');
        selectedNumbersInput.value = JSON.stringify(selectedNumbersArray);
    }

    // Función para calcular el total a pagar basado en los números seleccionados
    function calculateTotal(selectedNumbers) {
        const precioPorNumero = 35000;
        return selectedNumbers.length * precioPorNumero;
    }

    // Detectar el envío del formulario
    const buyTicketForm = document.getElementById('buyTicketForm');
    buyTicketForm.addEventListener('submit', function (event) {
        // Obtener todos los campos del formulario
        const nombre = document.getElementById('nombre').value.trim();
        const apellido = document.getElementById('apellido').value.trim();
        const departamento = document.getElementById('usp-custom-departamento-de-residencia').value.trim();
        const ciudad = document.getElementById('usp-custom-municipio-ciudad').value.trim();
        const celular = document.getElementById('celular').value.trim();
        const correo = document.getElementById('correo').value.trim();
        const totalPagar = document.getElementById('totalPagar').value.trim();

        // Obtener el campo oculto con los números seleccionados
        const selectedNumbersInput = document.getElementById('numerosSeleccionados');
        const selectedNumbers = JSON.parse(selectedNumbersInput.value); // Convertir JSON string a array
        // Obtener la cantidad de números seleccionados
        const valueTotalNumeros = document.querySelectorAll('#ticketNumber .selected-number').length;

        // Mostrar la cantidad de números en el input
        const contenidoValueNumeros = document.getElementById('totalNumeros');
        contenidoValueNumeros.value = valueTotalNumeros;  // Usar .value en lugar de .innerText para un <input> o <textarea>


        // Verificar si algún campo está vacío o los números no han sido seleccionados
        if (!nombre || !apellido || !departamento || !ciudad || !celular || !correo || selectedNumbers.length === 0 || !totalPagar) {
            event.preventDefault(); // Cancelar el envío del formulario
            alert('Debe completar todos los campos y seleccionar números antes de continuar.');
        } else {
            // Aquí el formulario se enviará normalmente con todos los datos, incluyendo los números seleccionados y totalPagar
        }
    });

 const btnDeseameSuerte = document.getElementById('btnDeseameSuerte');

btnDeseameSuerte.addEventListener('click', function () {
    const divs = document.querySelectorAll('.available-number');
    const filteredDivs = Array.from(divs).filter(div => !div.classList.contains('sold-number'));

    if (filteredDivs.length === 0) {
        alert('Todos los números están vendidos.');
        return;
    }

    btnDeseameSuerte.disabled = true;

    function simulateClick(element) {
        const event = new MouseEvent('click', {
            bubbles: true,
            cancelable: true,
            view: window
        });
        element.dispatchEvent(event);
    }

    function visualEffect(index) {
        setTimeout(function() {
            // Quitar la clase 'selected-number' de todos los elementos
            filteredDivs.forEach(div => div.classList.remove('selected-number'));

            // Aplicar la clase 'selected-number' al div actual si no la tiene ya
            if (!filteredDivs[index].classList.contains('selected-number')) {
                filteredDivs[index].classList.add('selected-number');
            }

            // Si es la última iteración, simular clic en el div actual
            if (index === filteredDivs.length - 1) {
                setTimeout(function() {
                    // Verificar nuevamente si el elemento actual tiene la clase 'selected-number'
                    if (filteredDivs[index].classList.contains('selected-number')) {
                        simulateClick(filteredDivs[index]);
                    }
                    // Habilitar el botón después de completar la selección
                    btnDeseameSuerte.disabled = false;
                }, 500); // Retardo antes de simular clic
            } else {
                visualEffect(index + 1);
            }
        }, 100); // Tiempo entre cada cambio de div en milisegundos (ajustable)
    }

    // Mezclar aleatoriamente los divs filtrados
    shuffleArray(filteredDivs);

    // Iniciar el efecto visual desde el primer div
    visualEffect(0);
});

// Función para mezclar aleatoriamente un array (algoritmo de Fisher-Yates)
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

})

