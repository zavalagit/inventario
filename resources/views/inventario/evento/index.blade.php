@extends('plantilla')

@section('titulo')
    Evento
@endsection

@section('css')
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

        /* pinta la ralla de abajo del imput */
        .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
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

        .card-header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */   
            color:white;
            }

            .boton {
                cursor: pointer;
                border: none;
                background: 0;
                padding: 0 0 0 5px;
                font-size: 14px !important;
                line-height: 1.5;
                
                }

                .boton:focus {
                    outline: none;
                    box-shadow: none;
                  }

                
            
                  

                

   </style>
@endsection



@section('contenido')


                <div style="height: 50px;"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.mensaje')
                            <div class="card shadow-lg p-3 mb-5 bg-white ">
                                <div class="card-header text-center">
                                    <div class="row">
                                        <div class="col-12 col-md-8 text-center">
                                            @if (count($eventos))
                                                <h4>LISTADO DE EVENTOS<span class="badge badge-warning badge-pill">{{$eventos->count()}}</span></h4>
                                            @else
                                                <h4>LISTADO DE EVENTOS<span class="badge badge-warning badge-pill">0</span></h4>
                                            @endif
                                        </div>
                                        <div class="col-6 col-md-4"><a href="{{route('crear_evento')}}" class="btn btn-success float-right">Registrar Evento</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tabla-inventario" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">TIPO</th>
                                                <th scope="col">ENTREGA</th>
                                                <th scope="col">RECIBE</th>
                                                <th scope="col">UNIDAD</th>
                                                <th scope="col">USUARIO</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col">ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($eventos))
                                                @php
                                                $no = 1;
                                                @endphp
                    
                                                    @foreach ($eventos as $key => $evento)
                                                        <tr>
                                                            <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                                                            <td>{{$evento->tipo}}</td>
                                                            <td>{{$evento->cargo_1.' '.$evento->entrega}}</td>
                                                            <td>{{$evento->cargo_2.' '.$evento->recibe}}</td>
                                                            @if (!empty($evento->unidad->nombre))
                                                                <td>{{$evento->unidad->nombre}}</td> 
                                                            @else
                                                                <td>"*****"</td> 
                                                            @endif
                                                            <td>{{$evento->usuarios->nombre}}</td>
                                                            <td>{{$evento->created_at->format('d-m-Y H:i:s')}}</td>
                                                            <td>
                                                                
                                                                    
                                                                  
                                                                    {{--<form action="{{route('eliminar_medida', ['id' => $medida->id])}}" class="d-inline form-eliminar" method="GET">
                                                                        @csrf @method("delete")
                                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="left" title="Eliminar este registro">
                                                                            <button type="submit" class="eliminar boton" id="campo" rel="tooltip">
                                                                                <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                                                            </button>
                                                                        </span>
                                                                    </form> --}}
                                                                {{-- @if ($evento->tipo == 'recepcion' || $evento->tipo == 'entrega')
                                                                    <a class="nota" href="{{route('comprobante-salida', ['id' => $evento->id])}}" data-evento-id="{{$evento->id}}" target="_blank">
                                                                        <span class="" tabindex="0" data-toggle="tooltip" data-placement="left" title="Recibo de salida">
                                                                            <i class="far fa-file-alt fa-2x"></i>
                                                                        </span>
                                                                    </a>
                                                                @endif --}}

                                                                @if ($evento->tipo == 'recepcion' || $evento->tipo == 'entrega')

                                                                    <a href="{{route('editar_evento', ['id' => $evento->id])}}">
                                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="left" title="Editar este registro">
                                                                            <i class="fas fa-edit fa-2x"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a class="" href="{{route('comprobante-salida', ['id' => $evento->id])}}" target="_blank">
                                                                        {{-- <span class="" tabindex="0" data-toggle="tooltip" data-placement="left" title="Recibo de salida"> --}}
                                                                            <i class="far fa-file-alt fa-2x"></i>
                                                                        {{-- </span> --}}
                                                                    </a>
                                                                @endif
                                                                    
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
                                            @else
                                                    <tr class="table-warning">
                                                        <td colspan="12">
                                                            <blockquote>No hay registros</blockquote>
                                                        </td>
                                                    </tr>
                                            @endif
                    
                                        </tbody>
                                    </table> 
                                </div>   
                            </div>
                        </div>       
                    </div>                  
                </div>             
@endsection

@section("scripts")
<script src="{{asset('js/inventario/eliminar_registro.js')}}" type="text/javascript"></script>
<script>
    $(document.body).on("click",".nota",function(e) {
        e.preventDefault();
        let id = $(this).attr('data-evento-id');
        
            console.log(id);
            $.ajax({
            type: 'get',
            url: '/comprobante-salida/'+id,
            
            success:function(respuesta){
                window.open('http://inventario.test/comprobante-salida/2', '_blank');
            }
         });
        //    $("[data-toggle='tooltip']").tooltip('destroy');
    });
    </script>

@endsection