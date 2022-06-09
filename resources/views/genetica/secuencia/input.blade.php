
<div class="input-group" id="grupo__valor">
    <div class="input-group-prepend">
    <label for="valor" class="input-group-text requerido formulario__label" id="inputGroupPrepend">VALOR</label>
    </div>
    
        <input type="text" name="valor[{{$marcador_id}}][{{$numero}}]" class="form-control" value="{{old('valor', $valor ?? '')}}"  placeholder="ingrese valor del marcador" required>
        @if ($numero > 1)
            <a href="#" data-id="{{$marcador_id}}" class="remover_campo"><i class="fas fa-times-circle fa-lg text-danger" ></i></a>
        @endif
        
    
    
    <div class="invalid-feedback">Complete el campo.</div>  
</div>   


