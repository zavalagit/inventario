// esta funcion llena el campo slug cambiando mayusculas por minusculas del campo nombre
$(document).ready(function () {
     $('#nombre').on('change',function(){
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});