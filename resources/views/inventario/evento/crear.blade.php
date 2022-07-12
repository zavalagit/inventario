@extends('plantilla')

@section('titulo')
    Crear Evento
@endsection




@section("css")
    <style media="screen">
        .text {   
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.7); 
        }

        .btn {
            margin-left: 10px;
            margin-right: 10px;
        }

        .btn-primary {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(58, 133, 191, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(58, 133, 191, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }
        .btn-primary:hover {
            color: #FFF;
            background: rgba(58, 133, 191, 0.75);
            border: 2px solid rgba(58, 133, 191, 0.75);
        }

        .btn-secondary {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(203, 62, 52, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(191, 62, 58, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }
        .btn-secondary:hover {
            color: #FFF;
            background: rgba(203, 62, 52, 0.75);
            border: 2px solid rgba(191, 62, 58, 0.75);
        }

    
        .card-header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */   
            color:white;
        }

        .card-header2{
            background: linear-gradient(to right, #2a442e, #14cc23); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */   
            color:white;
        }

        .card-header2 {
            padding: 0.75rem 1.25rem;
        }    

            .valid-feedback {
                display: none;
                width: 100%;
                margin-top: .25rem;
                font-size: 80%;
                color: #28a745;
            }

    </style>
@endsection






@section('contenido')



<div x-data="{
    number : 0,
    delete_producto(el){
        {{-- console.log(el.parentNode.parentNode); --}}
        el.parentNode.parentNode.remove();

    },
    clonar_producto(el){
        document.getElementById('registrar_producto').appendChild(el.parentNode.parentNode);
        buscar_producto
    },
   
    }">
    <div style="height: 50px;"></div>
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    
                    <div class="card shadow-lg p-3 mb-5 bg-white ">
                        <div class="card-header text-center">
                            <div class="row">
                                <div class="col-12 col-md-8 text-center"><h4>CREAR UN EVENTO</h4></div>
                                <div class="col-6 col-md-4"><a href="{{route('evento')}}" class="btn btn-info float-right"><i class="fa fa-fw fa-reply-all"></i>Listado</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('guardar_evento')}}" id="form-general" class="needs-validation" method="POST" autocomplete="off">
                                @csrf
                                
                                <div class="form-row mb-3 justify-content-center">
                                
                                        
                                        <div class="form-check form-check-inline">
                                            <input x-on:click="number=1" class="form-check-input" type="radio" name="tipo" id="recepcion" value="recepcion">
                                            <label class="form-check-label" for="recepcion">RECEPCION</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input x-on:click="number=2" class="form-check-input" type="radio" name="tipo" id="entrega" value="entrega">
                                            <label class="form-check-label" for="entrega">ENTREGA</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input x-on:click="number=3" class="form-check-input" type="radio" name="tipo" id="agregar" value="agregar">
                                            <label class="form-check-label" for="agregar">AGREGAR</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input x-on:click="number=4" class="form-check-input" type="radio" name="tipo" id="cancelar" value="cancelar">
                                            <label class="form-check-label" for="cancelar">CANCELAR</label>
                                        </div>
                                        
                                    
                                </div>
                                
                                    <section id="recepcion" x-show="number == 1">
                                        <div class="row">
                                            <div class="col s12 mb-3 card-header2">
                                            <blockquote class="text-center">
                                                <h6><b>REGISTRO DATOS DE RECEPCION</b></h6>
                                            </blockquote>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE ENTREGA</span>
                                                </div>
                                                <input type="text" name="nombre_entrega" class="form-control" id="nombre_entrega" value=""  placeholder="ingrese nombre la persona que entrega"  required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>   
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE RECIBE</span>
                                                </div>
                                                <input type="text" name="nombre_recibe" class="form-control" id="nombre_recibe" value=""  placeholder="ingrese nombre la persona que recibe"  required>
                                                <div class="valid-feedback">¡Ok válido!</div>
                                                <div class="invalid-feedback">Complete el campo.</div>   
                                            </div>
                                        </div>      
                                    </section>

                                    <section id="registrar_producto" x-show="number > 0">
                                        <div class="row">
                                            <div class="col s12 mb-3 card-header2">
                                            <blockquote class="text-center">
                                                <h6><b>DATOS DEL PRODUCTO</b></h6>
                                            </blockquote>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s2 mb-3">
                                               
                                                <a id="add-desc" data-toggle="tooltip" data-placement="right" title="Agregar mas productos">
                                                  <i class="fa fa-plus-circle fa-lg clonar" aria-hidden="true"></i>
                                                </a>
                                               
                                            </div>
                                        </div>
                                        {{-- @include('inventario.evento.form',['numero' => 1])      --}}
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
                                                    </div>
                                                    <input type="text" name="nombre_producto[]" class="form-control buscar_producto" id="1" value=""  placeholder="nombre del producto">
                                                    <input type="hidden" name="id_producto[]" class="producto-id_1">
                                                    <div class="valid-feedback">¡Ok válido!</div>
                                                    <div class="invalid-feedback">Complete el campo.</div>   
                                                </div>
                                                <p class="producto-stock_1"></p>
                                            </div>
                                            
                                            <div class="col-sm-3 mb-3">
                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text requerido" id="inputGroupPrepend">STOCK</span>
                                                    </div>
                                                    <input type="text" name="stock[]" class="form-control" value=""  placeholder="cantidad">
                                                    <div class="valid-feedback">¡Ok válido!</div>
                                                    <div class="invalid-feedback">Complete el campo.</div>   
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text requerido" id="inputGroupPrepend">MEDIDA</span>
                                                    </div>
                                                    <input type="text" name="medida[]" class="form-control medida_1" value=""  placeholder="unidad de medida">
                                                    <div class="valid-feedback">¡Ok válido!</div>
                                                    <div class="invalid-feedback">Complete el campo.</div>   
                                                </div>
                                            </div>
                                            
                                        </div> 
                                    </section>

                                   
                            
                                <div class="form-row">
                                    <div class="col-sm-4">
                                        @include('includes.boton-form-crear')
                                    </div>
                                    <div class="col-sm-6">
                                        @include('includes.form-error')
                                        @include('includes.mensaje')
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>   
                    </div>
                </div>       
            </div>                  
        </div>
</div>


    
@endsection

@section("scripts")
<script src="{{asset('js/inventario/mas_input.js')}}" type="text/javascript"></script>
<script >

    $(document.body).on("click",".buscar_producto",function(e) {
        e.preventDefault();
         //var padre = $(this).parent().attr('id');
        const num = $(this).attr('id');
        var elementos = document.getElementsByClassName('buscar_producto');
        $('.buscar_producto').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{route('buscar.productos')}}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    //se define lo quiero que ocurra cuando tengo una respuesta
                    //respose procesa la informacion de la variable data
                    success: function(data){
                        response(data)
                    }
                });
            },
            focus: function(event, ui){
                $( "#"+ num +".buscar_producto" ).val( ui.item.label );
                return false;
            },
            select: function(event, ui){
                $( ".producto-id_" + num ).val( ui.item.id );
                $( ".medida_" + num ).val( ui.item.medida );
                $( ".producto-stock_" + num ).html("cantidad " + ui.item.stock );
            }
        });
        console.log(num);

    });
</script>
@endsection

