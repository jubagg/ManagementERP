{{-- Codigo --}}
<div class="col-3">
    <div class="form-group">
        <label for="artcodbar">Código de barras</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-barcode fa-fw"></i>
                </span>
            </div>
            <input type="text" name="artcodbar" id="artcodbar" value="{{$errors->has('artcodbar') ? '' : old('artcodbar')}}" class="form-control {{$errors->has('artcodbar') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
        </div>
        @if($errors->has('artcodbar'))
            <small class="form-text text-danger">{{$errors->first('artcodbar')}}</small>
        @endif
    </div>
</div>
<div class="col-3">
    <div class="form-group">
    <label for="arttipcodbar">Tipo de código de barras</label>
    <select class="form-control" name="arttipcodbar" id="arttipcodbar">
        <option value="">Seleccionar</option>
        @foreach($tipobarra as $tb)
    <option value="{{$tb->codtid}}" {{ old('arttipcodbar')  == $tb->codtid ? 'selected' : '' }}>{{$tb->codtdes}}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">EAN13 - EAN8</small>
    @if($errors->has('arttipcodbar'))
        <small class="form-text text-danger">{{$errors->first('arttipcodbar')}}</small>
    @endif
    </div>
</div>
<div class="col-3">
    <label for="">Agregar varios códigos de barras</label>
   <button disabled class="btn btn-success" type="button" data-toggle="modal" data-target="#modalMultiplesCodigos" href="#modalMultiplesCodigos">
       <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
       <span class="d-none d-inline-block">Múltiples códigos</span>
   </button>
</div>
