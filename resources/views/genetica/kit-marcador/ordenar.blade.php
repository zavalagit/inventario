@extends('plantilla')

@section('titulo')
    ORDENAR MARCADOR
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

        .card-header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */   
            color:white;
            }

        .fas{
            cursor: move;
        }
           

              

   </style>
@endsection

@section("scripts")
<script src="{{asset('js/genetica/Sortable.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/genetica/options.js')}}" type="text/javascript"></script>
@endsection

@section('contenido')


                <div style="height: 50px;"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.mensaje')
                            <div class="card shadow-lg p-3 mb-5 bg-white ">
                                <div class="card-header">
                                    
                                    <div class="row">
                                        <div class="col-12 col-md-8 text-center"><h4>LISTADO MARCADORES CON {{$kit->nombre}}</h4></div>
                                        <div class="col-6 col-md-4"><a href="{{route('kit_marcador', ['kit' => $kit])}}" class="btn btn-info float-right"><i class="fa fa-fw fa-reply-all"></i>Seleccionar Marcadores</a></div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="mb-12">Ordenar Marcadores</h2>
                                            @csrf
                                            <input type="hidden" name="kit" value="{{ $kit->id }}">
                                                <div class="list-group" id="tareas">
                                                    @foreach ($KitMarcadores as $key => $marcador)
                                                        <div class="list-group-item" data-orden={{$marcador->id}} >
                                                            <h5><i class="fas fa-grip-vertical mr-2"></i> {{$marcador->nombre}}</h5>
                                                        </div>
                                                    @endforeach
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>       
                    </div>                  
                </div>             
@endsection