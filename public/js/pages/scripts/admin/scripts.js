/* esta funcion elimina un sierto tiempo los mensajes */
$(document).ready(function () {
    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('auto-dismiss') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    
    //esto es el diseño de los mensajes de tooltip
    $(function () {
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]',
            trigger: 'hover',
            placement: 'top',
            html: true,
            container: 'body'
            
        });
    })

    $('ul.sidebar-menu').find('li.active').parents('li').addClass('active');
    // Trabajo con Ventana de Roles muestra la ventana modal.
    //console.log('entrasdasd');
    const modal = $('#modal-seleccionar-rol');
    if (modal.length && modal.data('rol-set') == 'NO') {
        modal.modal('show');
    }

    //de la ventana modal asigna el rol que elegiste
    $('.asignar-rol').on('click', function (event) {
        event.preventDefault();
        const data = {
            rol_id: $(this).data('rolid'),
            rol_nombre: $(this).data('rolnombre'),
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, '/ajax-sesion', 'asignar-rol');
    });
    //esta funcion cambia de rol al usuario logiado
    $('.cambiar-rol').on('click', function (event) {
        event.preventDefault();
        modal.modal('show');
    });

    function ajaxRequest(data, url, funcion) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'asignar-rol' && respuesta.mensaje == 'ok') {
                    $('#modal-seleccionar-rol').hide();
                    location.reload();
                }
            }
        });
    }
    
});

