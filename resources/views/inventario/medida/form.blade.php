<div class="col-md-8 mb-3">
                    
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
      </div>
      <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $data->nombre ?? '')}}"  placeholder="ingrese nombre de la unida de medida" onkeyup="javascript:this.value=this.value.toUpperCase();"  required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>
