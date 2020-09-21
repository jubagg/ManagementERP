                            {{-- Sucursal --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="suc">Sucursal</label>
                                  <select class="form-control {{$errors->has('suc') ? 'is-invalid' : ''}}" name="suc" id="suc">
                                    <option value="">Seleccionar</option>
                                    @foreach($sucursal as $s)
                                    <option value="{{$s->sid}}" {{ old('suc') == $s->sid ? 'selected' : '' }}>{{$s->sdes}}</option>
                                    @endforeach
                                  </select>
                                    @if($errors->has('suc'))
                                        <small class="form-text text-danger">{{$errors->first('suc')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Zona --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="zona">Zona</label>
                                  <select class="form-control {{$errors->has('zona') ? 'is-invalid' : ''}}" name="zona" id="zona">
                                    <option value="">Seleccionar</option>
                                    @foreach($zonas as $z)
                                    <option value="{{$z->zid}}" {{ old('zona') == $z->zid ? 'selected' : '' }}>{{$z->zdes}}</option>
                                    @endforeach
                                  </select>
                                  @if($errors->has('zona'))
                                        <small class="form-text text-danger">{{$errors->first('zona')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Categoria cliente --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="catcli">Categoria cliente</label>
                                  <select class="form-control {{$errors->has('catcli') ? 'is-invalid' : ''}}" name="catcli" id="catcli">
                                    <option value="">Seleccionar</option>
                                    @foreach($tipocliente as $tc)
                                    <option value="{{$tc->tcid}}" {{ old('catcli') == $tc->tcid ? 'selected' : '' }}>{{$tc->tcdes}}</option>
                                    @endforeach
                                  </select>
                                  @if($errors->has('catcli'))
                                        <small class="form-text text-danger">{{$errors->first('catcli')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Condicion responsable --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="responsable">Cond. Responsable</label>
                                  <select class="form-control {{$errors->has('responsable') ? 'is-invalid' : ''}}" name="responsable" id="responsable">
                                    <option value="">Seleccionar</option>
                                    @foreach($iva as $res)
                                    <option value="{{$res->crid}}" {{ old('responsable') == $res->crid ? 'selected' : '' }}>{{$res->crdes}}</option>
                                    @endforeach
                                  </select>
                                  @if($errors->has('responsable'))
                                        <small class="form-text text-danger">{{$errors->first('responsable')}}</small>
                                    @endif
                                </div>
                            </div>

                            {{-- ganancias --}}

                            {{-- limite de credito --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="limcred">Límite de crédito</label>
                                    <input type="text" class="form-control {{$errors->has('limcred') ? 'is-invalid' : ''}}" name="limcred" id="limcred" aria-describedby="helpId" placeholder="" value="{{$errors->has('limcred') ? '' : old('limcred')}}">
                                    @if($errors->has('limcred'))
                                        <small class="form-text text-danger">{{$errors->first('limcred')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- condicion de venta --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="venta">Cond. de venta</label>
                                    <select class="form-control {{$errors->has('venta') ? 'is-invalid' : ''}}" name="venta" id="venta">
                                      <option value="">Seleccionar</option>
                                      @foreach($ventas as $v)
                                      <option value="{{$v->cvid}}" {{ old('venta') == $v->cvid ? 'selected' : '' }}>{{$v->cvdes}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('venta'))
                                          <small class="form-text text-danger">{{$errors->first('venta')}}</small>
                                      @endif
                                  </div>
                            </div>
                            {{-- descuentos --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="des">Descuento</label>
                                    <input type="text" class="form-control" name="des" id="des" aria-describedby="helpId" placeholder="" value={{old('des')}}>
                                </div>
                            </div>
