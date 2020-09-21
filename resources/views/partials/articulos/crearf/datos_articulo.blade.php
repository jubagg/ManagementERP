{{-- Codigo --}}
<div class="col-2">
    <div class="form-group">
        <label for="artcodigo">Código</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-hashtag fa-fw"></i>
                </span>
            </div>
            <input type="text" name="artcodigo" id="artcodigo" value="{{$errors->has('artcodigo') ? '' : old('artcodigo')}}" class="form-control {{$errors->has('artcodigo') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" required>
        </div>
        <small id="helpId" class="text-muted">Valor de sistema</small>
        @if($errors->has('artcodigo'))
            <small class="form-text text-danger">{{$errors->first('artcodigo')}}</small>
        @endif
    </div>
</div>
{{-- Nombre --}}
<div class="col-3">
    <div class="form-group">
        <label for="artnombre">Nombre</label>
        <input type="text" name="artnombre" id="artnombre" class="form-control {{$errors->has('artnombre') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" required value="{{$errors->has('artnombre') ? '' : old('artnombre')}}">
        <small id="helpId" class="form-text text-muted">Nombre descriptivo del producto, usar una regla para que todos sean similares</small>
        @if($errors->has('artnombre'))
            <small class="form-text text-danger">{{$errors->first('artnombre')}}</small>
        @endif
    </div>
</div>
