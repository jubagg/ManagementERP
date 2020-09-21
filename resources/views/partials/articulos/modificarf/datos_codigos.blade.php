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
            <input type="text" name="artcodbar" id="artcodbar" value="{{(!$errors->has('artcodbar') && !old('artcodbar') )? $articulo->artcodbarun : old('artcodbar')}}" class="form-control {{$errors->has('artcodbar') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
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
    <option value="{{$tb->codtid}}" {{ ($articulo->arttipcodbar  == $tb->codtid &&  !old('arttipcodbar')) ? 'selected' : ($tb->codtid == old('arttipcodbar') ? 'selected':'') }}>{{$tb->codtdes}}</option>
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
    <a name="multiplescodigosbarras" id="multiplescodigosbarras" class="btn btn-primary" href="{{route('articulos.codigosmulti.crear', $articulo->artcod)}}" role="button">Agregar varios códigos       <i class="fas fa-plus fa-fw" aria-hidden="true"></i></a>

   </button>
</div>
<div class="col-3">
    <small>Recuerde que para usar el modulo de multiples códigos de barras no deberá de tener ingresado el código de barras en el campo único de este formulario</small>
</div>
