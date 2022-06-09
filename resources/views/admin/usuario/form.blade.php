
<div class="col-md-3 mb-3">
                       
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text requerido" id="inputGroupPrepend">USUARIO</span>
    </div>
    <input type="text" name="usuario" class="form-control" id="usuario" value="{{old('usuario', $data->usuario ?? '')}}"  placeholder="ingrese usuario" required>
    <div class="valid-feedback">¡Ok válido!</div>
  <div class="invalid-feedback">Complete el campo.</div>   
  </div>
</div>

<div class="col-md-6 mb-3">
                        
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE</span>
    </div>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $data->nombre ?? '')}}"  placeholder="ingrese nombre completo"  required>
    <div class="valid-feedback">¡Ok válido!</div>
  <div class="invalid-feedback">Complete el campo.</div>   
  </div>
</div>

 
<div class="input-group col-md-3 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text requerido" id="inputGroupPrepend">ROL</span>
  </div>
  <select name="rol_id[]" id="rol_id" class="form-control" multiple required>
    <option value="">Seleccione el rol</option>
      @foreach ($rols as $id=> $nombre)
      <option value="{{$id}}"
      {{is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '')  : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '')}}
      >
      {{$nombre}}</option>
      @endforeach
  </select>
</div>


<div class="col-md-6 mb-3">
                      
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text {{!isset($data) ? 'requerido' : ''}}" id="inputGroupPrepend">PASSWORD</span>
    </div>
    <input type="text" name="password" class="form-control" id="password" value=""  placeholder="ingrese contraseña" {{!isset($data) ? 'required' : ''}}>
    <div class="valid-feedback">¡Ok válido!</div>
  <div class="invalid-feedback">Complete el campo.</div>   
  </div>
</div>

<div class="col-md-6 mb-3">
                        
  <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text {{!isset($data) ? 'requerido' : ''}}" id="inputGroupPrepend">REPETIR PASSWORD</span>
      </div>
      <input type="text" name="re_password" class="form-control" id="re_password" value=""  placeholder="repetir contraseña"  {{!isset($data) ? 'required' : ''}}>
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div>   
  </div>
</div>



