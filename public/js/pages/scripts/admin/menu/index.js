$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        console.log(data);
        $.ajax({
            url: '/admin/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
            }
        });
    });

    $('.eliminar-menu').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        //console.log(url);
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
                        window.location.href = url;
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

    
    $('#nestable').nestable('expandAll');
});