// esto es para mostrar los iconos 
$(document).ready(function () {
    $('#icono').on('blur', function () {
        $('#mostrar-icono').removeClass().addClass('fa ' + $(this).val());
    });
    
});