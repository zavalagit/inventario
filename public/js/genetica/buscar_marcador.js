
    $(document.body).on('keyup','#search',function(e){
        e.preventDefault();
        
        const data = {
            kit_id: $('input[name=kit]').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
            search: $(this).val()
        };

       
        
        //console.log(data);
        //console.log(_token);

        $.ajax({
            url: '/buscar-marcadores',
            type: 'POST',
            data: data,
            success: function (respuesta) {
                //console.log(respuesta);

                $('.mostrar_tabla_marcadores').empty().append(respuesta);
                // if (respuesta.respuesta == "ok") {
                //     Genetica.notificaciones("Cambio de posicion de marcador", 'success');
                // } else {
                //     Genetica.notificaciones("Error de posicion", 'error');
                // }  
            }
        });
  
        
     });