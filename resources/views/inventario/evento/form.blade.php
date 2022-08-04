@if (isset($numero))
        <div class='row'>
            <div class='col-sm-4 mb-3'>
        
                <div class='input-group'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text requerido' id='inputGroupPrepend'>NOMBRE</span>
                    </div>
                    <input type='text' name='nombre_producto[]' class='form-control buscar_producto' id='{{$numero}}' value=''  placeholder='nombre del producto'>
                    <input type='hidden' name='id_producto[]' class='producto-id_{{$numero}}'>
                    <input type='hidden' name='producto_estock[]' class='stock-producto_{{$numero}}'>
                    <div class='valid-feedback'>¡Ok válido!</div>
                    <div class='invalid-feedback'>Complete el campo.</div>   
                </div>
                <p class='producto-stock_{{$numero}}'></p>
            </div>
            
            <div class='col-sm-3 mb-3'>
        
                <div class='input-group'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text requerido' id='inputGroupPrepend'>STOCK</span>
                    </div>
                    <input type='text' name='stock[]' class='form-control' value=''  placeholder='cantidad' required>
                    <div class='valid-feedback'>¡Ok válido!</div>
                    <div class='invalid-feedback'>Complete el campo.</div>   
                </div>
            </div>
        
            <div class='col-sm-4 mb-3'>
        
                <div class='input-group'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='inputGroupPrepend'>MEDIDA</span>
                    </div>
                    <input type='text' name='medida[]' class='form-control medida_{{$numero}}' id='' value='' disabled> 
                </div>
            </div>
        
            <div class='col-sm-1 mb-3'>
            <button type='button' @click.prevent='delete_producto($el)' name='button' class='btn btn-warning x-desc'>
                <i class='fa fa-times' aria-hidden='true'></i>
            </button>
        </div>
            
        </div> 
@endif

