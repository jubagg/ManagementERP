{{-- unidad de negocio --}}
<div class="col-3">
    <div class="form-group">
      <label for="artunneg">Unidad de negocio</label>
      <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-building fa-fw"></i>
            </span>
        </div>
        <select class="form-control  {{$errors->has('artunneg') ? 'is-invalid' : ''}}" name="artunneg" id="artunneg">
            <option value="">Seleccionar</option>
            @foreach($unnegocio as $un)
            <option value="{{$un->anid}}"{{ ($articulo->artunneg == $un->anid && !old('artunneg')) ? 'selected' : ($un->anid == old('artunneg') ? 'selected' : '') }} >{{$un->andesc}}</option>
            @endforeach
        </select>
      </div>
      @if($errors->has('artunneg'))
      <small class="form-text text-danger">{{$errors->first('artunneg')}}</small>
  @endif
    </div>
</div>

{{-- unidad de IVA --}}
<div class="col-3">
    <div class="form-group">
      <label for="artiva">I.V.A.</label>
      <div class="input-group ">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-percent fa-fw"></i>
            </span>
        </div>
        <select class="form-control {{$errors->has('artiva') ? 'is-invalid' : ''}}" name="artiva" id="artiva">
            <option value="">Seleccionar</option>
            @foreach($iva as $i)
            <option value="{{$i->icid}}" {{ ($articulo->artiva == $i->icid &&  !old('artiva')) ? 'selected' : ($i->icid == old('artiva') ? 'selected' : '') }}>{{$i->icdesc}}</option>
            @endforeach
        </select>
      </div>
      @if($errors->has('artiva'))
      <small class="form-text text-danger">{{$errors->first('artiva')}}</small>
  @endif
    </div>
</div>

{{-- bonificacion --}}
<div class="col-3">
    <div class="form-group">
        <label for="artbonificacion">Bonificación</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-percent fa-fw"></i>
                </span>
            </div>
            <input type="text" name="artbonificacion" id="artbonificacion" value="{{(!$errors->has('artbonificacion') && !old('artbonificacion'))? $articulo->artbonf : old('artbonificacion')}}" class="form-control {{$errors->has('artbonificacion') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
        </div>
        @if($errors->has('artbonificacion'))
            <small class="form-text text-danger">{{$errors->first('artbonificacion')}}</small>
        @endif
    </div>
</div>

{{-- fecha de bonificacion --}}
<div class="col-3">
    <div class="form-group">
        <label for="artfecbon">Caducidad de bonificación</label>
        <div class="input-group">
            <input type="date" name="artfecbon" id="artfecbon" value="{{(!$errors->has('artfecbon') && !old('artfecbon')) ? $articulo->artfecdesc : old('artfecbon')}}" class="form-control {{$errors->has('artfecbon') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId">
        </div>
        @if($errors->has('artfecbon'))
            <small class="form-text text-danger">{{$errors->first('artfecbon')}}</small>
        @endif
    </div>
</div>

{{-- cuenta contable compra --}}
<div class="col-3">
    <div class="form-group">
      <label for="artcontabc">Cuenta contable compra</label>
      <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-file-invoice-dollar fa-fw"></i>
            </span>
        </div>
        <select class="form-control" name="artcontabc" id="artcontabc">
            <option value="">Seleccionar</option>

            <option value="" ></option>

        </select>
      </div>
    </div>
</div>
{{--  cuenta contable venta --}}
<div class="col-3">
    <div class="form-group">
      <label for="artcontabv">Cuenta contable venta</label>
      <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-file-invoice-dollar fa-fw"></i>
            </span>
        </div>
        <select class="form-control" name="artcontabv" id="artcontabv">
            <option value="">Seleccionar</option>

            <option value="" ></option>

        </select>
      </div>
    </div>
</div>
