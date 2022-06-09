@extends('plantilla')

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
        #tabla-entradas{
            width: 180% !important;
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

        div.muestra {
            background-color: lightblue;
            width: 1200px;
            height: 110px;
            overflow: auto;
        }

        

   </style>
@endsection

@section('contenido')

   
      
        {{-- <div align="center">
            <h2 class="text"> Mostramos tabla de todas las muestras</h2>
        </div> --}}
         
   <!--Navbar-->

  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 0px; margin-top: 30px;">
    <div class="container-fluid">
        
            <form class="col-12">
                {{-- <div class="row">
                    <div class="form-group active-pink-2 col-md-6">
                        <input class="form-control" type="text" name="buscar_kit" value="{{$buscar_kit}}" placeholder="Buscar por kit" aria-label="Search">
                    </div>
                    
                    
                </div>  --}}
                <div class="row">
                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="">KIT</label>
                            </div>
                            <select class="custom-select" name="buscar_kit" id="">
                                <option value="0">---</option>
                                @foreach ($kits as $kit)
                                @if ($buscar_kit == $kit->id)
                                    <option value="{{$kit->id}}" selected>{{$kit->descripcion}}</option>
                                @else
                                    <option value="{{$kit->id}}">{{$kit->descripcion}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="">PLANTILLA</label>
                            </div>
                            <select class="custom-select" name="buscar_plantilla" id="">
                                <option value="0">---</option>
                                @foreach ($plantillas as $plantilla)
                                @if ($buscar_plantilla == $plantilla->id)
                                    <option value="{{$plantilla->id}}" selected>{{$plantilla->nombre}}</option>
                                @else
                                    <option value="{{$plantilla->id}}">{{$plantilla->nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="">GRUPO</label>
                            </div>
                            <select class="custom-select" name="buscar_grupo" id="">
                                @if ($buscar_grupo == 4)
                                <option value="4">Restos Humanos</option>
                                <option value="2">Familias o Referencias</option>
                            @else
                                <option value="2">Familias o Referencias</option>
                                <option value="4">Restos Humanos</option>
                            @endif
                                
                            </select>
                        </div>
                </div>        
                  
                    
                        <button type="submit" name="buscar_btn" id="sidebarCollapse" class="btn  btn-primary btn-lg">
                            <i class="fas fa-align-left"></i>
                            <span>Buscar</span>
                        </button>
                        <button class="btn  btn-primary btn-lg" type="submit" name="buscar_btn" value="pdf"><i style="color:red;" class="fas fa-file-pdf fa-lg"></i></button>
                        <button class="btn  btn-primary btn-lg" type="submit" name="buscar_btn" value="excel"><i style="color:darkgreen;" class="fas fa-file-excel fa-lg"></i></button>

                    
                  
            </form>
        
    </div>
</nav>
<div> 
    <h5 class="text-center">
    @if (count($muestras) && count($orden_marcadores))
        <b>TABLA POR KIT DE LABORATORIO </b><span class="badge badge-primary badge-pill">{{$muestras->count()}}</span>
    @else
    <b>TABLA POR KIT DE LABORATORIO </b><span class="badge badge-primary badge-pill">0</span>
    @endif
       
    </h5>
</div>

 
            <table id="tabla-entradas" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">KIT</th>
                    <th scope="col">MUESTRA</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">NOTA</th>
                    <th scope="col">MARCADORES</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($muestras) && count($orden_marcadores))
                            @php
                                $no = 1;
                            @endphp

                    @foreach ($muestras as $key => $muestra)
                    <tr>
                        <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                        <td width="10%">{{$muestra->kits->descripcion}}</td>
                        <td width="5%">{{$muestra->muestra}}</td>
                        <td width="15%">{{$muestra->Nombre}}</td>
                        <td width="20%">{{$muestra->Nota}}</td>
                        <td class="colorcol">
                            <div class="muestra">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="trcolorborde">
                                   
                                                @foreach ($orden_marcadores as $capturavalor)
                                                <th class="thcolorborde" scope="col">{{$capturavalor->marcadores->LOCUS}}&nbsp1</th>
                                                <th class="thcolorborde" scope="col">{{$capturavalor->marcadores->LOCUS}}&nbsp2</th>
                                                @endforeach
                                  
                                            
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orden_marcadores as $capturavalor)
                                        @if ($muestra->capturavalores->contains('id_locus',$capturavalor->id_marcador))
                                            @if ($muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus == '')
                                                    <td class="tdcolorborde">0</td>
                                            @else
                                                <td class="tdcolorborde">{{$muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus}}</td>
                                            @endif
                                            
                                            @if ($muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus2 == '')
                                                    <td class="tdcolorborde">0</td>
                                            @else
                                                <td class="tdcolorborde">{{$muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus2}}</td>
                                            @endif
                                            
                                                                                
                                        @else
                                        <td class="tdcolorborde"></td>
                                        <td class="tdcolorborde"></td>
                                         
                                            
                                        @endif
                                            
                                        @endforeach
                                    
                                        {{-- @foreach ($muestra->capturavalores as $capturavalor)
                                        <td class="tdcolorborde">{{$capturavalor->valor_locus}}</td>
                                        <td class="tdcolorborde">{{$capturavalor->valor_locus2}}</td>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                              </div>
                                
                            
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

  

@endsection