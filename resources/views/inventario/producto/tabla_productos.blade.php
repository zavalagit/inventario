<table id="tabla-inventario" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">MEDIDA</th>
            <th scope="col">MATERIAL</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @if (count($Productos))
            @php
            $no = 1;
            @endphp

                @foreach ($Productos as $key => $producto)
                    <tr>
                        <th class="th-contador" scope="row" width="1.5%">{{$no++}}</th>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>{{$producto->medida->nombre}}</td>
                        <td>{{$producto->material->nombre}}</td>
                        <td>
                            
                                 <a href="{{route('editar_producto', ['id' => $producto->id])}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="left" title="Editar este registro">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </span>
                                </a>
                              
                                <form action="{{route('eliminar_producto', ['id' => $producto->id])}}" class="d-inline form-eliminar" method="POST">
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