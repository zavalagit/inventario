//esta funcion elige que tipo de aletifyjs se requiere
var Inventario = function () {
    
    return {
        
        notificaciones: function (mensaje, tipo) {
            if (tipo == 'error') {
                alertify.error(mensaje);
            } else if (tipo == 'success') {
                alertify.success(mensaje);
            } else if (tipo == 'info') {
                alertify.message(mensaje);
            } else if (tipo == 'warning') {
                alertify.warning(mensaje);
            }
        },
    }
}();

var Genetica = function () {
    
    return {
        
        notificaciones: function (mensaje, tipo) {
            if (tipo == 'error') {
                alertify.error(mensaje);
            } else if (tipo == 'success') {
                alertify.success(mensaje);
            } else if (tipo == 'info') {
                alertify.message(mensaje);
            } else if (tipo == 'warning') {
                alertify.warning(mensaje);
            }
        },
    }
}();