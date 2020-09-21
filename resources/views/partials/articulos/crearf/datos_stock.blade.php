{{-- unidad de medida --}}
<div class="col-3">
    <div class="form-group">
      <label for="artstkmed">Unidad de medida</label>
      <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-box fa-fw"></i>
            </span>
        </div>
        <select class="form-control {{$errors->has('artstkmed') ? 'is-invalid' : ''}}" name="artstkmed" id="artstkmed">
            <option value="">Seleccionar</option>
            @foreach($tipomedida as $tm)
            <option value="{{$tm->tmid}} {{ old('artstkmed')  == $tm->tmid ? 'selected' : '' }}" >{{$tm->tmdesc}}</option>
            @endforeach
        </select>
      </div>
      @if($errors->has('artstkmed'))
      <small class="form-text text-danger">{{$errors->first('artstkmed')}}</small>
  @endif
    </div>
</div>
{{-- art con stk --}}
<div class="col-3">
    <br>
    <div class="form-check m-2">
        <label class="form-check-label m-1">
            <input type="checkbox" class="form-check-input" name="artcontstk" id="artcontstk" value="1" >
            Permitir control de stock
        </label>
    </div>
</div>

{{-- stk minimo --}}
<div class="col-3">
    <div class="form-group">
        <label for="artlimminstk">Límite mínimo de stock</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-percent fa-fw"></i>
                </span>
            </div>
            <input type="text" name="artlimminstk" id="artlimminstk" value="{{$errors->has('artlimminstk') ? '' : old('artlimminstk')}}" class="form-control {{$errors->has('artlimminstk') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
        </div>
        @if($errors->has('artlimminstk'))
            <small class="form-text text-danger">{{$errors->first('artlimminstk')}}</small>
        @endif
    </div>
</div>

{{-- stk maximo --}}
<div class="col-3">
    <div class="form-group">
        <label for="artlimmaxstk">Límite máximo de stock</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-percent fa-fw"></i>
                </span>
            </div>
            <input type="text" name="artlimmaxstk" id="artlimmaxstk" value="{{$errors->has('artlimmaxstk') ? '' : old('artlimmaxstk')}}" class="form-control {{$errors->has('artlimmaxstk') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
        </div>
        @if($errors->has('artlimmaxstk'))
            <small class="form-text text-danger">{{$errors->first('artlimmaxstk')}}</small>
        @endif
    </div>
</div>
