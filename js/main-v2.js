document.addEventListener('DOMContentLoaded', function () {
    let currentPage = 1; // Página actual de la paginación
    let selectedNumbers = []; // Números seleccionados por el usuario

    // Inicializa la aplicación cargando la primera página de números y configurando los eventos
    function init() {
        loadNumbers(currentPage); // Cargar números para la página inicial
        setupEventListeners();   // Configurar los eventos de la interfaz
    }

    /**
     * Carga los números y la paginación para la página especificada
     * @param {number} page - Página de números a cargar
     */
    function loadNumbers(page) {
        fetch('./functions/load_numbers.php?page=' + page)
            .then(response => response.json())
            .then(data => {
                updateUI(data); // Actualiza la UI con los números y la paginación
            })
            .catch(error => console.error('Error al cargar los números:', error));
    }

    /**
     * Actualiza la interfaz de usuario con los números y los controles de paginación
     * @param {Object} data - Datos recibidos de la API
     */
    function updateUI(data) {
        const numberContainer = document.getElementById('number-container');
        const pagination = document.getElementById('pagination');

        numberContainer.innerHTML = ''; // Limpiar números existentes
        pagination.innerHTML = '';     // Limpiar controles de paginación

        // Crear y agregar los divs para los números
        data.numbers.forEach(number => {
            const numberDiv = document.createElement('div');
            numberDiv.className = getNumberClass(number); // Obtener la clase CSS del número
            numberDiv.textContent = number.numero_disponible;

            // Agregar clase de selección si el número está en la lista de seleccionados
            if (selectedNumbers.includes(number.numero_disponible)) {
                numberDiv.classList.add('selected-number');
            }

            // Configurar evento de clic para seleccionar o deseleccionar números
            if (number.vendido !== 'x') {
                numberDiv.addEventListener('click', () => toggleNumberSelection(numberDiv, number));
            }

            numberContainer.appendChild(numberDiv); // Añadir el número al contenedor
        });

        // Configurar controles de paginación
        setupPagination(data);
    }

    /**
     * Obtiene la clase CSS adecuada basada en el estado de venta del número
     * @param {Object} number - Información del número
     * @returns {string} - Clase CSS para el número
     */
    function getNumberClass(number) {
        if (number.vendido === 'x') return 'number available-number sold-number';
        if (number.vendido === 'p') return 'number available-number reserved-number';
        return 'number available-number';
    }

    /**
     * Alterna la selección de un número cuando se hace clic en él
     * @param {HTMLElement} numberDiv - Elemento div del número
     * @param {Object} number - Información del número
     */
    function toggleNumberSelection(numberDiv, number) {
        if (selectedNumbers.includes(number.numero_disponible)) {
            // Si el número ya está seleccionado, eliminarlo de la lista
            selectedNumbers.splice(selectedNumbers.indexOf(number.numero_disponible), 1);
            numberDiv.classList.remove('selected-number');
        } else {
            // Si el número no está seleccionado, agregarlo a la lista
            selectedNumbers.push(number.numero_disponible);
            numberDiv.classList.add('selected-number');
        }
    }

    /**
     * Configura los botones de paginación (Atrás y Mostrar más)
     * @param {Object} data - Datos de paginación recibidos de la API
     */
    function setupPagination(data) {
        const pagination = document.getElementById('pagination');

        // Crear el botón de "Atrás"
        const prevLi = document.createElement('li');
        prevLi.className = (data.currentPage <= 1 ? 'disabled' : '');
        const prevA = document.createElement('a');
        prevA.className = 'page-link';
        prevA.href = '#';
        prevA.textContent = 'Atrás';
        prevA.addEventListener('click', (e) => {
            e.preventDefault();
            if (data.currentPage > 1) {
                currentPage--;
                loadNumbers(currentPage); // Cargar números de la página anterior
            }
        });
        prevLi.appendChild(prevA);
        pagination.appendChild(prevLi);

        // Crear el botón de "Mostrar más"
        const nextLi = document.createElement('li');
        nextLi.className = (data.currentPage >= data.totalPages ? 'disabled' : '');
        const nextA = document.createElement('a');
        nextA.className = 'page-link';
        nextA.href = '#';
        nextA.textContent = 'Mostrar más';
        nextA.addEventListener('click', (e) => {
            e.preventDefault();
            if (data.currentPage < data.totalPages) {
                currentPage++;
                loadNumbers(currentPage); // Cargar números de la página siguiente
            }
        });
        nextLi.appendChild(nextA);
        pagination.appendChild(nextLi);
    }

    /**
     * Muestra el modal de pago con los números seleccionados
     */
    function showPaymentModal() {
        const modalBody = document.querySelector('#buyTicketModal .modal-body');
        const ticketNumbersDiv = modalBody.querySelector('#ticketNumber');
        ticketNumbersDiv.innerHTML = ''; // Limpiar números del ticket

        selectedNumbers.forEach(numero => {
            const numberDiv = document.createElement('div');
            numberDiv.className = 'number available-number selected-number';
            numberDiv.textContent = numero;
            ticketNumbersDiv.appendChild(numberDiv);
        });

        const buyTicketModal = new bootstrap.Modal(document.getElementById('buyTicketModal'));
        buyTicketModal.show(); // Mostrar el modal
    }

    /**
     * Verifica los números reservados antes de proceder al pago
     */
    function checkReservedNumbers() {
        fetch('./functions/check_number.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ numbers: selectedNumbers })
        })
            .then(response => response.json())
            .then(data => {
                if (data.reservedNumbers.length > 0) {
                    handleReservedNumbers(data.reservedNumbers); // Manejar números reservados
                } else {
                    showPaymentModal(); // Mostrar el modal de pago si no hay números reservados
                    totalPagar(); // Actualizar el total a pagar
                }
            })
            .catch(error => console.error('Error al verificar números reservados:', error));
    }

    /**
     * Maneja los números reservados encontrados durante la verificación
     * @param {Array} reservedNumbers - Lista de números reservados
     */
    function handleReservedNumbers(reservedNumbers) {
        reservedNumbers.forEach(number => {
            alert(`Estimado usuario, el número ${number} se encuentra reservado, por favor seleccione otro.`);
            const index = selectedNumbers.indexOf(number);
            if (index > -1) {
                selectedNumbers.splice(index, 1);
                document.querySelectorAll('.number').forEach(div => {
                    if (div.textContent == number) {
                        div.classList.remove('selected-number');
                        div.classList.add('reserved-number');
                    }
                });
            }
        });
    }

    /**
     * Calcula el total a pagar basado en los números seleccionados
     */
    function totalPagar() {
        const selectedNumberDivs = document.querySelectorAll('#ticketNumber .selected-number');
        const selectedNumbersArray = Array.from(selectedNumberDivs).map(div => div.textContent.trim());
        const pagarInput = document.getElementById('totalPagar');
        pagarInput.value = `$ ${calculateTotal(selectedNumbersArray).toLocaleString('es-ES')}`;
        const selectedNumbersInput = document.getElementById('numerosSeleccionados');
        selectedNumbersInput.value = JSON.stringify(selectedNumbersArray);
    }

    /**
     * Calcula el total basado en el número de números seleccionados
     * @param {Array} selectedNumbers - Números seleccionados
     * @returns {number} - Total a pagar
     */
    function calculateTotal(selectedNumbers) {
        const precioPorNumero = 35000;
        return selectedNumbers.length * precioPorNumero;
    }

    /**
     * Configura los eventos de la interfaz
     */
    function setupEventListeners() {
        // Evento para el botón de pagar
        const payButton = document.getElementById('payButton');
        payButton.addEventListener('click', () => {
            if (selectedNumbers.length === 0) {
                alert('Debe seleccionar al menos un número antes de continuar.');
            } else {
                checkReservedNumbers(); // Verificar números reservados antes de proceder
            }
        });

        // Evento para el formulario de compra de boletos
        const buyTicketForm = document.getElementById('buyTicketForm');
        const btnPagar = document.querySelector('.btn-pagar');
        const spinner = btnPagar.querySelector('.spinner-border');
        const btnText = btnPagar.querySelector('.btn-text');

        buyTicketForm.addEventListener('submit', function (event) {
            const nombre = document.getElementById('nombre').value.trim();
            const apellido = document.getElementById('apellido').value.trim();
            const departamento = document.getElementById('usp-custom-departamento-de-residencia').value.trim();
            const ciudad = document.getElementById('usp-custom-municipio-ciudad').value.trim();
            const celular = document.getElementById('celular').value.trim();
            const correo = document.getElementById('correo').value.trim();
            const totalPagar = document.getElementById('totalPagar').value.trim();
            const selectedNumbersInput = document.getElementById('numerosSeleccionados');
            const selectedNumbers = JSON.parse(selectedNumbersInput.value);
            const valueTotalNumeros = document.querySelectorAll('#ticketNumber .selected-number').length;
            const contenidoValueNumeros = document.getElementById('totalNumeros');
            contenidoValueNumeros.value = valueTotalNumeros;

            if (!nombre || !apellido || !departamento || !ciudad || !celular || !correo || selectedNumbers.length === 0 || !totalPagar) {
                event.preventDefault();
                alert('Debe completar todos los campos y seleccionar números antes de continuar.');
            } else {
                // Deshabilitar el botón y mostrar el spinner durante el envío del formulario
                btnPagar.disabled = true;
                spinner.classList.remove('d-none'); // Mostrar el spinner
                btnText.textContent = 'Enviando...'; // Cambiar el texto del botón
            }
        });

        // Evento para el botón "Deseame suerte"
        const btnDeseameSuerte = document.getElementById('btnDeseameSuerte');
        btnDeseameSuerte.addEventListener('click', function () {
            const divs = document.querySelectorAll('.available-number');
            const filteredDivs = Array.from(divs).filter(div => !div.classList.contains('sold-number'));

            if (filteredDivs.length === 0) {
                alert('Todos los números están vendidos.');
                return;
            }

            btnDeseameSuerte.disabled = true; // Deshabilitar el botón mientras se realiza la selección

            // Función para simular el clic en un número
            function simulateClick(element) {
                const event = new MouseEvent('click', {
                    bubbles: true,
                    cancelable: true,
                    view: window
                });
                element.dispatchEvent(event);
            }

            // Función para aplicar un efecto visual en los números seleccionados
            function visualEffect(index) {
                setTimeout(function () {
                    filteredDivs.forEach(div => div.classList.remove('selected-number'));
                    if (!filteredDivs[index].classList.contains('selected-number')) {
                        filteredDivs[index].classList.add('selected-number');
                    }
                    if (index === filteredDivs.length - 1) {
                        setTimeout(function () {
                            if (filteredDivs[index].classList.contains('selected-number')) {
                                simulateClick(filteredDivs[index]); // Seleccionar el último número
                            }
                            btnDeseameSuerte.disabled = false; // Habilitar el botón de nuevo
                        }, 500);
                    } else {
                        visualEffect(index + 1); // Aplicar efecto en el siguiente número
                    }
                }, 100);
            }

            // Mezclar los números antes de aplicar el efecto visual
            shuffle(filteredDivs);
            visualEffect(0);
        });
    }

    /**
     * Mezcla aleatoriamente los elementos de un array
     * @param {Array} array - Array a mezclar
     */
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    init(); // Llamar a la función de inicialización
});
