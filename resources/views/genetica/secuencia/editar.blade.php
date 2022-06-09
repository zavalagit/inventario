@extends('plantilla')

@section('titulo')
    Editar Secuencia
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

            .valid-feedback {
                display: none;
                width: 100%;
                margin-top: .25rem;
                font-size: 80%;
                color: #28a745;
            }
            
            /*-----estilo de formulario------*/
            .formulario__label{
                cursor: pointer;
            }

            .formulario__input-error{
                font-size: 12px;
                display: none;
            }

            .formulario__input-error-activo{
                display: block;
            }

            .formulario__validacion-estado{
                position: relative;
                right: 23px;
                top: 10px;
                /*bottom: 13px;*/
                /*para que se muestre arriba*/
                z-index: 100;
                /*tamaño del icono*/
                font-size: 18px;
                /*esconder el icono*/
                opacity: 0;

            }

            /*----Estilos para Validacion---*/
            .input-group-correcto .formulario__validacion-estado{
                color: #1ed12d;
                opacity: 1;
            }

            .input-group-incorrecto .formulario__label{
                color: #bb2929;
            }

            .input-group-incorrecto .formulario__validacion-estado{
                color: #bb2929;
                opacity: 1;
            }

            .input-group-incorrecto .form-control{
                border: 3px solid #bb2929;
            }

            /* modificaciones de las tablas */
        #tabla-genetica{
            width: 100% !important;
        }
        #tabla-valores{
            /* width: 180% !important; */
        }

        thead{
            background-color: #394049 !important;
            height: 50px !important;
        }

        th{
            color:#c09f77;
            padding: 8px 0 8px 0;
        }
        th.th-contador{
            background-color:#394049 !important;
            text-align: center;
  
        }
        th,td{
            padding: 5px 5px !important;
            /* padding-right: 1px;
            padding-right: 1px; */
            border-radius: 0 !important;
            text-align: center;
            
        }
        .thcolorborde{
            border: lightgoldenrodyellow 2px solid;
        }

        .tdcolorborde{
            border: lightcoral 2px solid;
        }
        .trcolorborde{
            border: black 3px solid;
            border-bottom: 3px solid black;
        }

        .colorcol{
            color:#c10f77;
            border-bottom: 1px solid #f48fb1;
        }
    </style>
@endsection

@section("scripts")
<script src="{{asset('js/genetica/formulario.js')}}" type="text/javascript"></script>
<script src="{{asset('js/genetica/lista_marcador.js')}}" type="text/javascript"></script>
<script src="{{asset('js/genetica/clonar_input.js')}}" type="text/javascript"></script>
@endsection

@section('contenido')


<div style="height: 50px;"></div>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                
                <div class="card shadow-lg p-3 mb-5 bg-white ">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-12 col-md-8 text-center"><h4>EDITAR SECUENCIAS</h4></div>
                            <div class="col-6 col-md-4"><a href="{{route('secuencia')}}" class="btn btn-info float-right"><i class="fa fa-fw fa-reply-all"></i>Listado</a></div>
                          </div>
                    </div>
                    <div class="card-body">
                            <form action="{{route('actualizar_secuencia', ['id' => $str])}}" id="form-general" class="needs-validation formulario" method="POST" autocomplete="off">
                            @csrf @method("put")
                            <input type="hidden" name="str" value="{{ $str->id }}">
                            <div class="form-row">
                            
                                    @include('genetica.secuencia.form')
                                
                            </div>
                            <div class="form-row">
                                <dir class="col-sm-4">
                                    @include('includes.boton-form-editar')
                                </dir>
                                <dir class="col-sm-6">
                                    @include('includes.form-error')
                                    @include('includes.mensaje')
                                </dir>
                            </div>
                            
                            
                            </form>
                    </div>   
                </div>
            </div>       
        </div>                  
    </div>



    
@endsection

