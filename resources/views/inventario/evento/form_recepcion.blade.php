<section id="recepcion">
    <div class="row">
        <div class="col s12 mb-3 card-header2">
        <blockquote class="text-center">
            <h6><b>REGISTRO DATOS DE RECEPCION</b></h6>
        </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text requerido" id="inputGroupPrepend">CARGO</span>
                </div>
                <input type="text" name="cargo_1" class="form-control" id="cargo_1" value="{{old('cargo_1', $data->cargo_1 ?? '')}}"  placeholder="ingrese cargo" required>
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
            </div>
        </div>
        <div class="col-sm-8 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE ENTREGA</span>
                </div>
                <input type="text" name="nombre_entrega" class="form-control" id="nombre_entrega" value="{{old('nombre_entrega', $data->entrega ?? '')}}"  placeholder="ingrese nombre la persona que entrega" required>
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text requerido" id="inputGroupPrepend">CARGO</span>
                </div>
                <input type="text" name="cargo_2" class="form-control" id="cargo_2" value="{{old('cargo_2', $data->cargo_2 ?? '')}}"  placeholder="ingrese cargo" required>
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
            </div>
        </div>
        <div class="col-sm-8 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text requerido" id="inputGroupPrepend">NOMBRE RECIBE</span>
                </div>
                <input type="text" name="nombre_recibe" class="form-control" id="nombre_recibe" value="{{old('nombre_recibe', $data->recibe ?? '')}}"  placeholder="ingrese nombre la persona que recibe" required>
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
            </div>
        </div>
    </div>      
</section>
