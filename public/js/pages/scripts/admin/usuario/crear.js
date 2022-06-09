//si el campo password es llenado sera requerido el campo re_password
$('#password').on('change', function(){
    const valor = $(this).val();
    if(valor != ''){
        $('#re_password').prop('required', true);
    }else{
        $('#re_password').prop('required', false);
    }
});
