const modal = $('#modal-tabla-secuencia');

//esta funcion manda llamar el modal para ver la secuencia con los valores
$('.btn-ver-secuencia').on('click', function (event) {
    event.preventDefault();
    const data = {
        _token: $('input[name=_token]').val(),
        secuencia: $(this).attr('data-secuencia'),
    };
    

    $.ajax({
        url: '/ver-secuencia',
        type: 'POST',
        data: data,
        success: function (respuesta) {
            //console.log(respuesta);
            //manda el resultado del controlador al div con la class=modal-body
            $('.modal-body').empty().append(respuesta);
            //muestra el modal
            modal.modal('show');
            
        }
    });

    
});