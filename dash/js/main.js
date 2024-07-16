document.addEventListener('DOMContentLoaded', function () {
    let currentPage = 1; // Variable para almacenar la página actual de la paginación
    let selectedNumbers = []; // Array para almacenar los números seleccionados

    // Función para cargar los números y la paginación para la página especificada
    function loadNumbers(page) {
        fetch('../../functions/load_numbers.php?page=' + page)
            .then(response => response.json())
            .then(data => {
                const numberContainer = document.getElementById('number-container');
                const pagination = document.getElementById('pagination');

                numberContainer.innerHTML = '';
                pagination.innerHTML = '';

                data.numbers.forEach(number => {
                    const numberDiv = document.createElement('div');
                    if (number.vendido === 'x') {
                        numberDiv.className = 'number available-number sold-number';
                    } else if (number.vendido === 'p') {
                        numberDiv.className = 'number available-number reserved-number';
                    } else {
                        numberDiv.className = 'number available-number';
                    }

                    numberDiv.textContent = number.numero_disponible;
                    if (selectedNumbers.includes(number.numero_disponible)) {
                        numberDiv.classList.add('selected-number');
                    }

                    if (number.vendido !== 'x') {
                        numberDiv.addEventListener('click', function () {
                            if (selectedNumbers.includes(number.numero_disponible)) {
                                const index = selectedNumbers.indexOf(number.numero_disponible);
                                selectedNumbers.splice(index, 1);
                                numberDiv.classList.remove('selected-number');
                            } else {
                                selectedNumbers.push(number.numero_disponible);
                                numberDiv.classList.add('selected-number');
                            }
                        });
                    }

                    numberContainer.appendChild(numberDiv);
                });

                // Generar paginación
                const prevLi = document.createElement('li');
                prevLi.className = '' + (data.currentPage <= 1 ? 'disabled' : '');
                const prevA = document.createElement('a');
                prevA.className = 'page-link';
                prevA.href = '#';
                prevA.textContent = 'Atrás';
                prevA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (data.currentPage > 1) {
                        currentPage--;
                        loadNumbers(currentPage);
                    }
                });
                prevLi.appendChild(prevA);
                pagination.appendChild(prevLi);

                const nextLi = document.createElement('li');
                nextLi.className = '' + (data.currentPage >= data.totalPages ? 'disabled' : '');
                const nextA = document.createElement('a');
                nextA.className = 'page-link';
                nextA.href = '#';
                nextA.textContent = 'Siguiente';
                nextA.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (data.currentPage < data.totalPages) {
                        currentPage++;
                        loadNumbers(currentPage);
                    }
                });
                nextLi.appendChild(nextA);
                pagination.appendChild(nextLi);
            })
            .catch(error => console.error('Error:', error));
    }

    function showPaymentModal() {
        const modalBody = document.querySelector('#buyTicketModal .modal-body');
        const ticketNumbersDiv = modalBody.querySelector('#ticketNumber');
        ticketNumbersDiv.innerHTML = '';
        selectedNumbers.forEach(numero => {
            const numberDiv = document.createElement('div');
            numberDiv.className = 'number available-number selected-number';
            numberDiv.textContent = numero;
            ticketNumbersDiv.appendChild(numberDiv);
        });

        const buyTicketModal = new bootstrap.Modal(document.getElementById('buyTicketModal'));
        buyTicketModal.show();
    }

    loadNumbers(currentPage);

    const payButton = document.getElementById('payButton');
    payButton.addEventListener('click', function () {
        if (selectedNumbers.length === 0) {
            alert('Debe seleccionar al menos un número antes de continuar.');
        } else {
            checkReservedNumbers(); // Nueva función para verificar los números reservados
        }
    });

    function checkReservedNumbers() {
        fetch('../../functions/check_number.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ numbers: selectedNumbers })
        })
        .then(response => response.json())
        .then(data => {
            if (data.reservedNumbers.length > 0) {
                data.reservedNumbers.forEach(number => {
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
            } else {
                showPaymentModal();
                totalPagar();
                const valueTotalNumeros = document.querySelectorAll('#ticketNumber .selected-number').length;
                const contenidoValueNumeros = document.getElementById('totalNumeros');
                contenidoValueNumeros.value = valueTotalNumeros;
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function totalPagar() {
        const selectedNumberDivs = document.querySelectorAll('#ticketNumber .selected-number');
        const selectedNumbersArray = Array.from(selectedNumberDivs).map(div => div.textContent.trim());
        const pagarInput = document.getElementById('totalPagar');
        pagarInput.value = `$ ${calculateTotal(selectedNumbersArray).toLocaleString('es-ES')}`;
        const selectedNumbersInput = document.getElementById('numerosSeleccionados');
        selectedNumbersInput.value = JSON.stringify(selectedNumbersArray);
    }

    function calculateTotal(selectedNumbers) {
        const precioPorNumero = 35000;
        return selectedNumbers.length * precioPorNumero;
    }

    document.getElementById('pagination').addEventListener('click', function (e) {
        if (e.target.textContent === '⬅ Atrás') {
            if (currentPage > 1) {
                currentPage--;
                loadNumbers(currentPage);
            }
        } else if (e.target.textContent === 'Siguiente ➡') {
            if (currentPage < data.totalPages) {
                currentPage++;
                loadNumbers(currentPage);
            }
        }
    });

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
            // Deshabilitar el botón y mostrar el spinner mientras el formulario está siendo enviado
            btnPagar.disabled = true;
            spinner.classList.remove('d-none'); // Mostrar el spinner
            btnText.textContent = 'Enviando...'; // Cambiar el texto del botón
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
            setTimeout(function () {
                filteredDivs.forEach(div => div.classList.remove('selected-number'));
                if (!filteredDivs[index].classList.contains('selected-number')) {
                    filteredDivs[index].classList.add('selected-number');
                }
                if (index === filteredDivs.length - 1) {
                    setTimeout(function () {
                        if (filteredDivs[index].classList.contains('selected-number')) {
                            simulateClick(filteredDivs[index]);
                        }
                        btnDeseameSuerte.disabled = false;
                    }, 500);
                } else {
                    visualEffect(index + 1);
                }
            }, 100);
        }

        shuffle(filteredDivs);
        visualEffect(0);
    });

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }
});
