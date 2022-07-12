$(document).on('click',".clonar",function(e){
    e.preventDefault();
    
    const data = {
        _token: $('input[name=_token]').val(),
        numero: $('.buscar_producto').length + 1
    };
    //var numero = $('.buscar_producto').length
    //var elementos = document.getElementsByClassName(nombres);
    //console.log(numero);
    
    $.ajax({
        url: '/mas-input',
        type: 'POST',
        data: data,
        success: function (respuesta) {
            //console.log(respuesta);

            $('#registrar_producto').append(respuesta);
            // if (respuesta.respuesta == "ok") {
            //     Genetica.notificaciones("Cambio de posicion de marcador", 'success');
            // } else {
            //     Genetica.notificaciones("Error de posicion", 'error');
            // }  
        }
    });

    
 });

 //guncion para eliminar
 $(document).on("click",".remover_campo",function(e) {
                e.preventDefault();
                
                //var index = $(this).index();
                //const marcador_id = $('#grupo__valor.input-group').parents('.remover_campo');
                const marcador_id = $(this).attr('data-id');
               // var listItem = $( ".remover_campo" );
               // saca la posicion del boton remover_campo
               console.log(marcador_id);
                let posicion_eliminar = $('.'+marcador_id+ '> #grupo__valor.input-group > .remover_campo').index(this) + 1;
                //var input_name = document.querySelector('#grupo__valor.input-group input[name="valor['+marcador_id+']['+posicion_eliminar+']"]').name;
                //saca el total de los inputs menos 1
                const total_inputs = $('.'+marcador_id+ '> #grupo__valor.input-group').length - 1;
                //typeof posicion_eliminar;
                //console.log(typeof posicion_eliminar);

                //console.log("posicion" +posicion_eliminar);
                //console.log("toral" +total_inputs);
                // console.log("toral" +total_inputs);
                // if (posicion_eliminar < total_inputs) {
                //     posicion_eliminar++;
                //     console.log(posicion_eliminar);
                // }
                let n = 0;
                
                for (posicion_eliminar; posicion_eliminar <= total_inputs; posicion_eliminar++) {
                     n = posicion_eliminar + 1;
                     //cambia el nombre del imput por medio del nombre
                    var cambiar_name = document.querySelector('#grupo__valor.input-group input[name="valor['+marcador_id+']['+n+']"]').name = 'valor['+marcador_id+']['+posicion_eliminar+']';
                    //console.log(cambiar_name);
                }
                //const input = $('.'+marcador_id+ '> #grupo__valor.input-group > input'); 
                //const input_name = document.getElementById('input[name="valor[10][1]"]');
                //var index = $('#grupo__valor.input-group > *'); 
                //const x = document.getElementsByClassName('.valor');
                //console.log("kit" +marcador_id);
                //console.log("posicion" +posicion_eliminar);
                //console.log(cambiar_name);
                //console.log("toral" +total_inputs);
                $(this).parent().remove();
                
        });