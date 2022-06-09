<div class="col-md-6 mb-3">
                        
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
      </div>
      <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $data->nombre ?? '')}}"  placeholder="ingrese nombre"  required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>

<div class="col-md-6 mb-3">
                       
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">SLUG</span>
      </div>
      <input type="text" name="slug" class="form-control" id="slug" value="{{old('slug', $data->slug ?? '')}}"  placeholder="ingrese slug" required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
  </div>