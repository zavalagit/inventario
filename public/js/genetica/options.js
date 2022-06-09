const tareas = document.getElementById('tareas');

const listaTareas = Sortable.create(tareas, {
    group:{
        name: "lista-tareas",
        //sacar elementos de esta lista puedes cambia a true, "clone" entre comillas puedes clonar
        pull: false,
        //que no puedan poner elementos dentro de la lista
        put: false
    },
    //dar animacion tiempo ms  
    animation: 150, 
    //para darle un efecto de traslacion
    easing: "cubic-bezier(0.7, 0, 0.84, 0)",
    //darle propieda al icono tipo fas de mover
    handle: ".fas",
    //cuando arrastras cambiar de color
    //ghostClass: "active"
    //cambia de color desde click mover
    chosenClass: "active",
    //quita la sobra al arrastrar 
    //dragClass: "invisible"
    //darle un nombre al data-id diferente
    dataIdAttr: "data-orden",
    //me va permitir correr funciones store
    //set me va permitir guardar el orden de los elementos
    store:{
        set: function(sortable){
            //trasformar la lista a un arreglo
            const orden = sortable.toArray();
            
            //console.log(orden);
            const data = {
                posicion: orden,
                _token: $('input[name=_token]').val(),
                kit_id: $('input[name=kit]').val()
            };
            console.log(data);
            $.ajax({
                url: '/guardar-orden-marcador',
                type: 'POST',
                data: data,
                success: function (respuesta) {
                    if (respuesta.respuesta == "ok") {
                        Genetica.notificaciones("Cambio de posicion de marcador", 'success');
                    } else {
                        Genetica.notificaciones("Error de posicion", 'error');
                    }  
                }
            });
        }
    }


});