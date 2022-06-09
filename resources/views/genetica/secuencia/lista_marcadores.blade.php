

    <table id="tabla-genetica" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NOBRE</th>
                <th scope="col">VALORES</th>
                
            </tr>
        </thead>
        <tbody>
            @if (count($listamarcadores))
                @php
                $no = 1;
                @endphp

                    @foreach ($listamarcadores as $key => $marcador)

                        @if (isset($accion))
                                <tr>
                                    <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                                    <!--nombre-->
                                    <td>{{$marcador->nombre}}</td>
                                    <!--input-->
                                    <td class={{ $marcador->id }}>
                                        <label for="Input">Campo</label>
                                            <button type="button" data-id={{$marcador->id}} class="clonar btn btn-secondary btn-sm">+</button>
                                                    @if (count($str->valores->where('marcador_id',$marcador->id)) > 1)
                                                    @php
                                                        $num = 1;
                                                    @endphp
                                                        @foreach ($str->valores->where('marcador_id',$marcador->id) as $valor)
                                                                @include('genetica.secuencia.input',['marcador_id' => $marcador->id, 'numero' => $num++, 'valor' => $valor->valor])
                                                        @endforeach
                                                    @else
                                                    @foreach ($str->valores->where('marcador_id',$marcador->id) as $valor)
                                                            @include('genetica.secuencia.input',['marcador_id' => $marcador->id, 'numero' => 1, 'valor' => $valor->valor])
                                                    @endforeach
                                                       
                                                        
                                                    @endif
                                                   
                                    </td>
                                    
                                </tr>
                            
                        @else
                                <tr>
                                    <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                                    <td>{{$marcador->nombre}}</td>
                                    <td class={{ $marcador->id }}>
                                        <label for="Input">Campo</label>
                                            <button type="button" data-id={{$marcador->id}} class="clonar btn btn-secondary btn-sm">+</button>
                                            
                                                <div class="input-group" id="grupo__valor">
                                                            @include('genetica.secuencia.input',['marcador_id' => $marcador->id, 'numero' => 1]) 
                                                </div>   
                                           
                                    </td>
                                    
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
    