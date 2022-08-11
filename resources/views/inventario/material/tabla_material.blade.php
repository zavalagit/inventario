<table id="tabla-inventario" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @if (count($materiales))
            @php
            $no = 1;
            @endphp

                @foreach ($materiales as $key => $material)
                    <tr>
                        <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                        <td>{{$material->nombre}}</td>
                        <td>
                            
                                <a href="{{route('editar_material', ['id' => $material->id])}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="left" title="Editar este registro">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </span>
                                </a>
                              
                                <form action="{{route('eliminar_material', ['id' => $material->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="left" title="Eliminar este registro">
                                        <button type="submit" class="eliminar boton" id="campo" rel="tooltip">
                                            <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                        </button>
                                    </span>
                                </form>
                            
                            
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