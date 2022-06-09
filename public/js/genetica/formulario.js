const formulario = document.getElementById('form-general');
const inputs = document.querySelectorAll('#form-general input');
const buttons = document.querySelectorAll('#form-general button');
var form = $('#form-general');


// console.log(formulario);
 console.log(form);
// console.log(buttons);

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
	folio: /^\d+[/](20[0-3][0-9])[-](G|Q|EXT)$/ // folio 0001/2021-G|Q|EXT
	//folio: /^\d+[/]\d{4}[-](G|Q|EXT)$/ // folio 0001/2021-G|Q|EXT
}

const campos = {
	folio: false
}

//dependiendo del input se realizan las funciones 
const validarFormulario = (e) =>{
	switch (e.target.name){
		case "folio":
			if (expresiones.folio.test(e.target.value)) {
				//getelementById regeresa el id de la clase
				document.getElementById('grupo__folio').classList.remove('input-group-incorrecto');
				document.getElementById('grupo__folio').classList.add('input-group-correcto');
				//querySelector se le pasa el id por eso signo #
				document.querySelector('#grupo__folio i').classList.add('fa-check-circle');
				document.querySelector('#grupo__folio i').classList.remove('fa-times-circle');
				//el . es porque estoy accediendo a una clase
				document.querySelector('#grupo__folio .formulario__input-error').classList.remove('formulario__input-error-activo');
				campos['folio'] = true;
			} else{
				document.getElementById('grupo__folio').classList.add('input-group-incorrecto');
				document.getElementById('grupo__folio').classList.remove('input-group-correcto');
				document.querySelector('#grupo__folio i').classList.add('fa-times-circle');
				document.querySelector('#grupo__folio i').classList.remove('fa-check-circle');
				document.querySelector('#grupo__folio .formulario__input-error').classList.add('formulario__input-error-activo');
				campos['folio'] = false;
			}
		//para trabajar con funciones
		//validarCampo(expresiones.folio, e.target, 'folio');	
		break;
	}
}

//funcion para enviar los datos a controlador de guardar o actualizar
const EnviarFormulario = (e) =>{
	
	switch (e.target.id){
		case "guardar":
			console.log(e.target.id);
				if (campos.folio) {
					//console.log(form);
					$.ajax({
				        url: '/secuencia',
				        type: 'POST',
				        data: form.serialize(),
				        success: function (respuesta) {
				             console.log(respuesta.mensaje);
				            if (respuesta.mensaje == "ok") {
				                Genetica.notificaciones('El registro creado con exito', 'success');
									formulario.reset();
									//borra el icono
									document.querySelectorAll('.input-group-correcto').forEach((icono) => {
										icono.classList.remove('input-group-correcto');
									});
				            } else {
				                Genetica.notificaciones('No se puede crear el registro ', 'error');
				            }

				        },
				        error: function (respuesta) {
							console.log(respuesta.status);
							document.getElementById('grupo__folio').classList.remove('input-group-correcto');
							document.getElementById('grupo__folio').classList.add('input-group-incorrecto');
							document.querySelector('#grupo__folio i').classList.remove('fa-check-circle');
							let firstkey = Object.keys(respuesta.responseJSON.errors)[0];
							console.log(respuesta.responseJSON.errors[firstkey][0]);	
							Genetica.notificaciones(respuesta.responseJSON.errors[firstkey][0], 'error');
				        }
				    });
					
				}
		break;
		case "actualizar":
			console.log(e.target.id);
			if (campos.folio) {
				const str_id = $('input[name=str]').val();
				//console.log(str_id);
				$.ajax({
					url: '/secuencia/'+str_id,
					type: 'PUT',
					data: form.serialize(),
					success: function (respuesta) {
						 console.log(respuesta.mensaje);
						 if (respuesta.mensaje == "ok") {
							Genetica.notificaciones('El registro se actualizon con exito', 'success');

						} else {
							Genetica.notificaciones('No se puedo actuaizar', 'error');
						}
						
						setTimeout(function(){
							//recargar la misma pagina
							//location.reload();
							//regresar a la pagina anterior
							var url_back =  document.referrer;
              				window.location = url_back;
						 },1500);

					},
					error: function (respuesta) {
						console.log(respuesta.status);
						
					}
				});
				
				
			}
		break;
	}
}

//esta funcion es para validar el input que se esta trabajando
// const validarCampo = (expresion, input, campo) =>{
// 	if (expresion.test(input.value)) {
// 		//importante cambiar las comilla simple por comilla de lado ``
// 		document.getElementById(`grupo__${campo}`).classList.remove('input-group-incorrecto');
// 		document.getElementById(`grupo__${campo}`).classList.add('input-group-correcto');
// 		//querySelector se le pasa el id por eso signo #
// 		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
// 		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
// 		//el . es porque estoy accediendo a una clase
// 		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
// 	} else{
// 		document.getElementById(`grupo__${campo}`).classList.add('input-group-incorrecto');
// 		document.getElementById(`grupo__${campo}`).classList.remove('input-group-correcto');
// 		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
// 		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
// 		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
// 	}
// }

//esta funcion recupera el input que se esta trabajando
inputs.forEach((input) => {
	//keyup cuando levante una tecla
	input.addEventListener('keyup', validarFormulario);
	//blur cuando des un click fuera 
	input.addEventListener('blur', validarFormulario);
});

//esta funcion me dice que boton click gurdar o editar
	buttons.forEach((button) => {
		//cuando le das click a un boton
		button.addEventListener('click', EnviarFormulario);
		
	});



//parar el envio de formulario
formulario.addEventListener('submit', (e) => {

	
	e.preventDefault();
	//console.log('enviar');

	// if (campos.folio) {
	// 	//console.log(form);
	// 	$.ajax({
    //         url: '/secuencia',
    //         type: 'POST',
    //         data: form.serialize(),
    //         success: function (respuesta) {
    //              console.log(respuesta.mensaje);
    //             if (respuesta.mensaje == "ok") {
    //                 Genetica.notificaciones('El registro creado con exito', 'success');
	// 					formulario.reset();
	// 					//borra el icono
	// 					document.querySelectorAll('.input-group-correcto').forEach((icono) => {
	// 						icono.classList.remove('input-group-correcto');
	// 					});
    //             } else {
    //                 Genetica.notificaciones('No se puede crear el registro ', 'error');
    //             }

    //         },
    //         error: function (respuesta) {
	// 			console.log(respuesta.status);
	// 			document.getElementById('grupo__folio').classList.remove('input-group-correcto');
	// 			document.getElementById('grupo__folio').classList.add('input-group-incorrecto');
	// 			document.querySelector('#grupo__folio i').classList.remove('fa-check-circle');
	// 			let firstkey = Object.keys(respuesta.responseJSON.errors)[0];
	// 			console.log(respuesta.responseJSON.errors[firstkey][0]);	
	// 			Genetica.notificaciones(respuesta.responseJSON.errors[firstkey][0], 'error');
    //         }
    //     });
		
	// }

});