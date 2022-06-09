

<table id="tabla-genetica" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Marcadores</th>
            <th scope="col" class="text-center">{{$kit->nombre}}</th>
            
            
        </tr>
    </thead>
    <tbody>
        @if (count($marcadores))
            @php
            $no = 1;
            @endphp

                    @foreach ($marcadores as $key => $marcador)
                        
                        <tr>
                            <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                            <td class="font-weight-bold"></i> {{$marcador["nombre"]}}</td>
                            
                                <td class="text-center">
                                    <input
                                    type="checkbox"
                                    class="kit_marcador"
                                    name="kit_marcador[]"
                                    data-marcadorid={{$marcador[ "id"]}}
                                    value="{{$kit->id}}" {{in_array($kit->id, array_column($KitMarcadores[$marcador["id"]], "id"))? "checked" : ""}}>
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