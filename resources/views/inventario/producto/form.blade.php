<div class="col-md-6 mb-3">
                    
    <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
          </div>
          <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $data->nombre ?? '')}}"  placeholder="ingrese nombre del producto" onkeyup="javascript:this.value=this.value.toUpperCase();"  required>
          <div class="valid-feedback">¡Ok válido!</div>
        <div class="invalid-feedback">Complete el campo.</div>   
    </div>

    
</div>

<div class="col-md-6 mb-3">
                    
  <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text requerido" id="inputGroupPrepend">MEDIDA</span>
        </div>
        <select name="medida" id="medida" class="form-control" required>
          <option value="">Seleccione la unidad de medida</option>
            @foreach ($medidas as $id=> $medida)
            <option value="{{$medida->id}}"
            
            {{isset($data) && ($data->unidadmedida_id === $medida->id) ? 'selected' : ''}}
            
            >
            {{$medida->nombre}}</option>
            @endforeach
        </select>     
  </div>


</div>
