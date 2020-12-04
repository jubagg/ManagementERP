<div class="form-row">
    <div class="col-3">
        <div class="form-group">
          <label for="prsuc">Sucursal</label>
          <select class="form-control" name="prsuc" id="prsuc">
            <option>Seleccionar</option>
            @foreach(Sucursales::getAll() as $suc)
                <option value="{{$suc->sid}}">{{$suc->sdes}}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label for="prlp">Lista</label>
            <select class="form-control" name="prlp" id="prlp">
                <option>Seleccionar</option>
            </select>
        </div>
    </div>

</div>

