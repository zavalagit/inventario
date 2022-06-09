<div class="col-md-6 mb-4">
                        
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
      </div>
      <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $rol->nombre ?? '')}}"  placeholder="ingrese nombre"  required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>