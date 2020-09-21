<div id="proveedor">
    <legend class="">Datos proveedor</legend>
    {{-- proveedor --}}
    <div class="form-row">
        <div class="col-3">
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select class="form-control" name="proveedor" id="proveedor">
                    <option>Seleccionar</option>
                    @foreach($proveedores as $pro)
                        <option value="{{$pro->clicodsis}}">{{$pro->clicodsis.' | '.$pro->clifantasia}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Centro emisor --}}
        <div class="col-1">
            <div class="form-group">
                <label for="cempro">C. Emisor</label>
                <input type="text" class="form-control" name="cempro" id="cempro" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        {{-- Num comprobante --}}
        <div class="col-2">
            <div class="form-group">
                <label for="numcompro">Núm. Comprobante</label>
                <input type="text" class="form-control" name="numcompro" id="numcompro" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        {{-- Fecha comprobante --}}
        <div class="col-2">
            <div class="form-group">
                <label for="feccompro">Fecha comprobante</label>
                <input type="date" class="form-control" name="feccompro" id="feccompro" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
</div>

