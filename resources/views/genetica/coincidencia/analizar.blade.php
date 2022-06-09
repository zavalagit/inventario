@extends('plantilla')

@section('titulo')
    Analizar
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

        .btn-warning {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(8, 138, 21, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(8, 138, 21, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }
        .btn-warning:hover {
            color: #FFF;
            background: rgba(10, 240, 37, 0.75);
            border: 2px solid rgba(10, 240, 37, 0.75);
        }

        /* pinta la ralla de abajo del imput */
        .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        #content{
            width: 100%;
            height: 50px;
            overflow: scroll;
        }
        .row {
            flex-wrap: nowrap;
        }
        /* modificaciones de las tablas */
        #contenedor_analizar{
            
        }

        /* modificaciones de las tablas */
        #tabla-genetica{
            width: 40% !important;
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

            .resaltar {
                outline: none;
                border: none;
                color: white;
                width:100%;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                transition-duration: 0.4s;
                cursor: pointer;
              }

              .button1 { 
                color: rgb(231, 16, 16); 
                border: 2px solid #4CAF50;
              }
              
              .button1:hover {
                background-color: #4CAF50;
                color: white;
                
              }

              .button1:focus {
                outline: none;
                
              }

              .borderrosa {
                border: 2px solid rgb(255, 0, 255);
              }

             mark{
                color: white;
             }
              
                

   </style>
@endsection

@section("scripts")
<script src="{{asset('js/genetica/resaltar.js')}}" type="text/javascript"></script>
@endsection

@section('contenido')


                <div style="height: 50px;"></div>
                <div class="container-fluid" id="contenedor_analizar">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.mensaje')
                            <div class="card shadow-lg p-3 mb-5 bg-white ">
                                <div class="card-header text-center">
                                    <div class="row">
                                        <div class="col-12 col-md-8 text-center">
                                            <h4>ANALIZAR COINCIDENCIAS<span class="badge badge-warning badge-pill"></span></h4>                                            
                                        </div>
                                        <div class="col-6 col-md-4"><a href="{{route('coincidencia', ['id' => $str_analizar->id])}}" class="btn btn-success float-right">Secuencias Concidencias</a></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="p-3" >
                                      <div class="card shadow-lg p-3 mb-5 bg-white">
                                        <div class="card-body">
                                            <table id="tabla-genetica" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-danger" COLSPAN="3">{{$str_analizar->folio}}</th>
                                                        
                                                    </tr>    

                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">MARCADORES</th>
                                                        <th scope="col">VALORES</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($str_analizar->kit->marcadores))
                                                        @php
                                                        $no = 1;
                                                        @endphp

                                                            @foreach ($str_analizar->kit->marcadores as $key => $marcador)
                                                            @if ((($loop->iteration) % 2) == 1)
                                                                <tr class="table-secondary">
                                                                    <th rowspan="{{count($str_analizar->valores->where('marcador_id',$marcador->id))}}" class="th-contador" scope="row">{{$no++}}</th>
                                                                    <td rowspan="{{count($str_analizar->valores->where('marcador_id',$marcador->id))}}" >{{$marcador->nombre}}</td>
                                                                            
                                                                        
                                                                        @if (count($str_analizar->valores->where('marcador_id',$marcador->id)) > 1)
                                                                        
                                                                            @foreach ($str_analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                                                @if ($loop->first)
                                                                                    <td ><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td>
                                                                                @else
                                                                                    <tr class="table-secondary"><td ><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td></tr>
                                                                                @endif
                                                                                
                                                                            @endforeach
                                                                        @else
                                                                        @foreach ($str_analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                                                <td><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td>
                                                                        @endforeach
                                                                        
                                                                            
                                                                        @endif
                                                                        
                                                                    
                                                                    
                                                                </tr>

                                                            @else
                                                                    <tr class="table-light">
                                                                        <th rowspan="{{count($str_analizar->valores->where('marcador_id',$marcador->id))}}" class="th-contador" scope="row" >{{$no++}}</th>
                                                                        <td rowspan="{{count($str_analizar->valores->where('marcador_id',$marcador->id))}}" >{{$marcador->nombre}}</td>
                                                                                
                                                                            
                                                                            @if (count($str_analizar->valores->where('marcador_id',$marcador->id)) > 1)
                                                                            
                                                                                @foreach ($str_analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                                                    @if ($loop->first)
                                                                                        <td ><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td>
                                                                                    @else
                                                                                        <tr class="table-light"><td ><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td></tr>
                                                                                    @endif
                                                                                    
                                                                                @endforeach
                                                                            @else
                                                                            @foreach ($str_analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                                                    <td ><button class="resaltar button1" id="{{$marcador->id}}-{{$valor->valor}}" value="{{$valor->valor}}">{{ $valor->valor }}</button></td>
                                                                            @endforeach
                                                                            
                                                                                
                                                                            @endif
                                                                    </tr>
                                                            @endif
                                                            
                                                                
                                                                        
                                                                    
                                                            
                                                            
                                                                
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
                                   
                                      
                                    @foreach ($str_selecionados as $key => $analizar)
                                            @include('genetica.coincidencia.tabla_analizar',['analizar' => $analizar])
                                    @endforeach

                                    
                                      
                                </div>
                                 
                            </div>
                        </div>       
                    </div>                  
                </div>    
                
                
@endsection