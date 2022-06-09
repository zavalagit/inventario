<div class="col-md-4 mb-3">
                        
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
      </div>
      <input type="text" name="titulo" class="form-control" id="titulo" value="{{old('titulo', $data->titulo ?? '')}}"  placeholder="ingrese titulo"  required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>

<div class="col-md-4 mb-3">
                       
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text requerido" id="inputGroupPrepend">URL</span>
      </div>
      <input type="text" name="url" class="form-control" id="url" value="{{old('url', $data->url ?? '')}}"  placeholder="ingrese url" aria-describedby="inputGroupPrepend" required>
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
  </div>

  <div class="col-md-3 mb-3">
                        
    <div class="input-group">
      <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupPrepend">ICONO</span>
      </div>
      <input type="text" name="icono" class="form-control" id="icono" value="{{old('icono', $data->icono ?? '')}}" placeholder="ingrese icono" aria-describedby="inputGroupPrepend">
      <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>   
    </div>
  </div>

  <div class="col-md-1 mb-3 bg-info p-1 text-center border">
     
           <span id="mostrar-icono" class="fa {{old("icono")}}"></span>
      
  </div>