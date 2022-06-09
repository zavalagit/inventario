$(function(){

    $(document).on('change','#kit_id',function(e){
        e.preventDefault();
        const data = {
            _token: $('input[name=_token]').val(),
            kit_id: $(this).val()
        };
        
        //console.log(data);
        
        $.ajax({
            url: '/consultar-lista-marcadores',
            type: 'POST',
            data: data,
            success: function (respuesta) {
                //console.log(respuesta);

                $('.lista_marcadores').empty().append(respuesta);
                // if (respuesta.respuesta == "ok") {
                //     Genetica.notificaciones("Cambio de posicion de marcador", 'success');
                // } else {
                //     Genetica.notificaciones("Error de posicion", 'error');
                // }  
            }
        });
  
        
     });

});

// $('#kit_id').on('change', function(){
//     const valor = $(this).val();
//     console.log(valor);
// });
