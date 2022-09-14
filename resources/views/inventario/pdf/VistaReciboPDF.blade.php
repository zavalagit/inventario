<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{asset('css/bootstrap4css/bootstrap.min.css')}}">
        <style media="screen">
            /** Definiendo el margen de la pagina **/
            @page {
                margin: 100px 25px;
            }

            header {
                position: absolute;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                
            }
                           
            /* modificaciones de las tablas */
            .table-bordered td, .table-bordered th{
                border: 1px solid #000000;
            }
            .table thead th{
                background-color: #e0e0e0 !important;
                border-bottom: 2px solid #151515;
            }
               
            th{
                background-color: #e0e0e0 !important;
               
               
            }
            th{
                background-color:#e0e0e0 !important;
                text-align: center;
               
      
            }
            th,td{
                /* padding: 5px 5px !important; */
                text-align: center;
                
            }
                       
    
                            
           /*________________header________________________*/
            div.header {
                display: block; 
                text-align: center; 
                
            }
            .td-encabezado{
                vertical-align:middle !important;
                width: 60%;
                text-align: center !important;
                margin-top: 2% !important;
                /* height: 140px !important; */
            }
            .td-encabezado p{
                margin:0 !important;
                padding: 0 !important;
                font-family: Arial, Helvetica, sans-serif;
                color: #152f4a;
            }    
    
            .td-fge{
                width: 20%;
                text-align: left !important;
                vertical-align:middle;
            }
            .td-mich{
                width: 20%;
                text-align: right !important;
                vertical-align:middle;
            }

            /*__Footer (pie de página)*/
            #footer{
                position: fixed;
                bottom: -80px;
                left: 0;
                right: 0;
                /* height: 40px; */
                width: 100%;
                padding: 0 !important;
            }

            .footer-table{
                width: 100% !important;
                margin: auto;
                padding: 0 !important;
            }
            .table-td-izq{
                background-color: #c6c6c6;
                width: 80%;
                font-size: 13px !important;
                text-align: center !important;
                vertical-align: auto !important;
                
            }
            .table-td-der{
                background-color: #152f4a;
                width: 20%;
                text-align: center !important;
                vertical-align: auto !important;
                color: #fff;
                font-size: 13px !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .seccion-cuatro{
                margin-top: 20px;
                height: 100px;
            }

            .card-body {
                padding: 3.25rem;
            }

            .seccion-cuatro{
                margin-top: 20px;
                height: 100px;
            }
      
    
       </style>
       
	    <title>Comprobante PDF</title>
    </head>
    <body>
        
            
                
                    {{-- <div class="header"> --}}
                        <header>      
                                <table class="table table-sm">
                                    <tr>
                                        <td class="td-fge">
                                            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/logos/escudo_mich_4.png" alt="" width="50"/>
                                        </td>
                                        <td class="td-encabezado">
                                            <p style="font-size:13px">  <b> FISCALÍA GENERAL DEL ESTADO DE MICHOACÁN </b> </p>
                                            <p style="font-size:11px">  <b> COORDINACION GENERALES DE SERVCIOS PERICIALES </b> </p>
                                            <p style="font-size:11px">  <b> ENLACE ADMINISTRATIVO </b> </p>
                                        </td>
                                        <td class="td-mich" >
                                            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/logos/fge_etiqueta_1.png" alt="" width="80"/>
                                        </td>
                                    </tr>
                                </table>
                        </header>    
                    {{-- </div> --}}
                    <footer id="footer">
                        <section class="seccion-cuatro">
                            <table class="table table-sm">
                                <tbody>
                                <tr>
                                <td style="border: 1px solid #737272; padding-top:30px;" width="40%"></td>
                                    <td style="border: 0px"></td>
                                    <td style="border: 1px solid #737272; padding-top:30px;" width="40%"></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:12px; padding:0; margin:0">{{$data->entrega}}</td>
                                    <td style="border: 0px"></td>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:12px; padding:0;">{{$data->recibe}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:10px; padding:0;">{{$data->cargo_1}}</td>
                                    <td style="border: 0px"></td>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:10px; padding:0;">{{$data->cargo_2}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:10px; padding:0px;"> <b>Nombre completo, cargo y firma (ENTREGA)</b> </td>
                                    <td style="border: 0px"></td>
                                    <td style="border: 1px solid #737272; text-align: center; font-size:10px; padding:0px;"> <b>Nombre completo, cargo y firma (RECIBE)</b> </td>
                                </tr>
                                </tbody>
                            </table>
                     </Section>
                        <table class="footer-table">
                          
                            <tr>
                                <td class="table-td-izq">
                                Periférico Independencia #5000 Col. Sentimientos de la Nación. Morelia, Michoacán. C.P. 58170 <b> /
                                    </b> (443) 322 3600 <b> / @FiscalíaMich </b>
                                </td>
                                <td class="table-td-der">
                                <b> fiscaliamichoacan.gob.mx </b>
                                </td>
                            </tr>
                        </table>
                    </footer>

                    <div class="card-body"> 
                        <table id="tabla-inventario" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre de la Unidada</th>
                                    <th width="40%">Fecha y hora de {{$data->tipo}}</th>
                                    <th width="10%">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if (!empty($data->unidad->nombre))
                                        <td>{{$data->unidad->nombre}}</td> 
                                    @else
                                        <td>"*****"</td> 
                                    @endif
                                        <td>{{$fecha}}</td>
                                        <td>{{$data->tipo}}</td>
                                </tr>
                            </tbody>
                        </table>
                    <main>
                        <table id="tabla-inventario" class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Articulo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Medida</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Observaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->productos as $key => $producto)
                                <tr>
                                    <th scope="row" width="1.5%">{{$key+1}}</th>
                                    <td>{{$producto->nombre}}</td>
                                    <td width="2%">
                                        @php
                                            $str = ltrim($producto->pivot->new_cantidad, '-');
                                        @endphp
                                            {{$str}}
                                    </td>
                                    <td>{{$producto->medida->nombre}}</td>
                                    <td>{{$producto->material->nombre}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                        
                        
                    </main>    
                        
                    </div>
                
                
            
            {{-- <script type="text/php">
                if ( isset($pdf) ) {
                    $font = $fontMetrics->getFont("helvetica", "bold");
                    $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
                }
            </script> --}}
            <script type="text/php">
                if (isset($pdf)) {
                    $x = 360;
                    $y = 10;
                    $text = "Paginas {PAGE_NUM} de {PAGE_COUNT}";
                    $font = null;
                    $size = 10;
                    $color = array(0,0,0);
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default
                    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                }
            </script>

            
    </body>
</html>

