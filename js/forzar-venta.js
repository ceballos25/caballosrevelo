document.addEventListener('DOMContentLoaded', function() {
    $('#buyTicketModalRespaldo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var id = button.data('id'); // Extraer la información de los atributos data-*
        var codigoTransaccion = button.data('codigo');
        var nombre = button.data('nombre');
        var celular = button.data('celular');
        var correo = button.data('correo');
        var departamento = button.data('departamento');
        var ciudad = button.data('ciudad');

        // Actualizar el contenido del modal
        var modal = $(this);
        modal.find('#id_transaccion').val(codigoTransaccion);
        modal.find('#celular').val(celular); // Limpiar el campo del celular (o llenarlo con datos si se desea)
        modal.find('#nombre').val(nombre);
        modal.find('#correo').val(correo);    
        modal.find('#departamento').val(departamento);    
        modal.find('#ciudad').val(ciudad);    
        modal.find('#numerosSeleccionados').val(id); // Campo oculto para almacenar el ID
    });
});