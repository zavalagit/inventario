$(document).ready(function () {
   //manda llamar jquery-confirm para saber si quieres eliminar el registro
       $("#tabla-inventario").on('submit', '.form-eliminar', function (e) {
        e.preventDefault();
        const form = $(this);
        //console.log(form);
        $.confirm({
            theme: 'dark',
            columnClass: 'col-md-6 col-md-offset-3',
            icon: 'fa fa-exclamation-triangle',
            title: '¿ Está seguro que desea eliminar el registro ?',
            content: "Esta acción no se puede deshacer!",
            type: 'red',
            
            buttons: {
                relizar:{
                    btnClass: 'btn-success',
                    action: function () {
                        ajaxRequest(form);
                    }

                },
                
                cancelar: {
                    btnClass: 'btn-danger',
                    action: function () {
                       
                    }
                },
                
                
            }
        });
        
    });

    //manda llamar el js/funciones que utiliza la libreria alertifyjs
    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                console.log(respuesta.mensaje);
                //console.log(form);
                if (respuesta.mensaje == "ok") {
                    //form.parents('tr').remove(); //esto elimina el registro de tabla no se vea
                    Inventario.notificaciones('El registro fue eliminado correctamente', 'success');
                    setInterval("location.reload()",1000);
                } else {
                    Inventario.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'error');
                }

            },
            error: function () {

            }
        });
    }
});