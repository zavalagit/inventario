<div class="p-3">
    <div class="card shadow-lg p-3 mb-5 bg-warning">
        <div class="card-body">
            <table id="tabla-genetica" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-success" COLSPAN="3">{{$analizar->folio}}</th>
                        
                    </tr>    
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">MARCADORES</th>
                        <th scope="col">VALORES</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if (count($analizar->kit->marcadores))
                        @php
                        $no = 1;
                        @endphp

                            @foreach ($analizar->kit->marcadores as $key => $marcador)
                                @if ((($loop->iteration) % 2) == 1)
                                    <tr class="table-secondary">
                                        <th rowspan="{{count($analizar->valores->where('marcador_id',$marcador->id))}}" class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                                        <td rowspan="{{count($analizar->valores->where('marcador_id',$marcador->id))}}">{{$marcador->nombre}}</td>
                                                
                                            
                                            @if (count($analizar->valores->where('marcador_id',$marcador->id)) > 1)
                                            
                                                @foreach ($analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                    @if ($loop->first)
                                                        <td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td>
                                                    @else
                                                        <tr class="table-secondary"><td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td></tr>
                                                    @endif
                                                    
                                                @endforeach
                                            @else
                                            @foreach ($analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                    <td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td>
                                            @endforeach
                                            
                                                
                                            @endif
                                            
                                        
                                        
                                    </tr>

                                @else
                                        <tr class="table-light">
                                            <th rowspan="{{count($analizar->valores->where('marcador_id',$marcador->id))}}" class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                                            <td rowspan="{{count($analizar->valores->where('marcador_id',$marcador->id))}}">{{$marcador->nombre}}</td>
                                                    
                                                
                                                @if (count($analizar->valores->where('marcador_id',$marcador->id)) > 1)
                                                
                                                    @foreach ($analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                        @if ($loop->first)
                                                            <td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td>
                                                        @else
                                                            <tr class="table-light"><td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td></tr>
                                                        @endif
                                                        
                                                    @endforeach
                                                @else
                                                @foreach ($analizar->valores->where('marcador_id',$marcador->id) as $valor)
                                                        <td id="{{$marcador->id}}-{{$valor->valor}}">{{ $valor->valor }}</td>
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