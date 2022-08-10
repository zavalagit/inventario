$(document.body).on('keyup','#search',function(e){
    e.preventDefault();
    
    const data = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        search: $(this).val()
    };

   
    
    //console.log(data);
    //console.log(_token);

    $.ajax({
        url: '/buscar-medida',
        type: 'POST',
        data: data,
        success: function (respuesta) {
            //console.log(respuesta);

            $('.mostrar_tabla_medidas').empty().append(respuesta);
            
        }
    });

    
 });