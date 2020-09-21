
{{-- cbu --}}
<div class="col-4">
    <div class="form-group" id="divcbu">
    <label for="cbcbu">CBU</label>
    <input type="text"
    class="form-control" name="cbcbu" id="cbcbu" aria-describedby="helpId" placeholder="">
    <small id="helpId" class="form-text text-muted {{$errors->has('cbcbu') ? 'is-invalid' : ''}}">Solo números</small>
        @if($errors->has('cbcbu'))
            <small class="form-text text-danger">{{$errors->first('cbcbu')}}</small>
        @endif
    </div>
</div>
{{-- banco --}}
<div class="col-4">
    <div class="form-group" id="divbanco">
        <label for="cbbanco">Banco</label>
        <div class="input-group">
            <select class="form-control" name="cbbanco" id="cbbanco">
                <option value="">Seleccionar</option>
                @foreach($bancos as $ban)
                <option value="{{$ban->bid}}">{{$ban->bdes}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBanco" href="#modalBanco">
                    <i class="fas fa-plus fa-fw"></i>
                </button>
            </div>
        </div>
        @if($errors->has('cbbanco'))
            <small class="form-text text-danger">{{$errors->first('cbbanco')}}</small>
        @endif
    </div>
</div>
{{-- Sucursal --}}
<div class="col-4">
    <div class="form-group">
      <label for="cbsucursal">Sucursal</label>
      <input type="text"
        class="form-control" name="cbsucursal" id="cbsucursal" aria-describedby="helpId" placeholder="" value="{{old('cbsucursal')}}">
    </div>
</div>
{{-- Tipo cuenta --}}
<div class="form-row">
    <h5 class="text-black-50">Tipo de cuenta bancaria</h5>
</div>

    <div class="col-12 justify-content-center text-center d-inline-flex my-5" id="divtipcue">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipcue" id="" value="ccp"> Cuenta corriente $
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipcue" id="" value="cap"> Caja ahorro $
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipcue" id="" value="ccd"> Cuenta corriente U$S
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipcue" id="" value="cad"> Caja de ahorro U$S
            </label>
        </div>
        @if($errors->has('tipcue'))
            <small class="form-text text-danger">{{$errors->first('tipcue')}}</small>
        @endif
    </div>

<div class="col text-right justify-content-right d-inline-flex">
    <div class="col">
        <button class="btn btn-secondary" type="reset">
            <i class="fas fa-undo fa-fw" aria-hidden="true"></i>
            <span class="d-none d-inline-block">Deshacer</span>
        </button>
        <button class="btn btn-success" {{-- type="submit" --}} id="formbancos">
            <i class="fas fa-save fa-fw" aria-hidden="true"></i>
            <span class="d-none d-inline-block">Guardar</span>
        </button>
    </div>
</div>

