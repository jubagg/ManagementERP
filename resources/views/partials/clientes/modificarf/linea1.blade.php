                            {{-- MODIFICAR --}}
                            {{-- Codigo --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-hashtag fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="codigo" id="codigo" value="{{!$errors->has('codigo') ? $cliente->clicodsis : old('codigo')}}" class="form-control" placeholder="" aria-describedby="helpId" readonly>
                                    </div>
                                    <small id="helpId" class="text-muted">Valor de sistema</small>
                                    @if($errors->has('codigo'))
                                        <small class="form-text text-danger">{{$errors->first('codigo')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Nombre --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" required value="{{!$errors->has('nombre') ? $cliente->clifantasia : old('nombre')}}">
                                    <small id="helpId" class="form-text text-muted">Nombre por el que es conocido el cliente. Solo para uso de los operadores</small>
                                    @if($errors->has('nombre'))
                                        <small class="form-text text-danger">{{$errors->first('nombre')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Razon social --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="rsocial">Razón social</label>
                                    <input type="text" value="{{!$errors->has('rsocial') ? $cliente->clirazons : old('rsocial')}}" name="rsocial" id="rsocial" class="form-control {{$errors->has('rsocial') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="form-text text-muted">El nombre real usado ante A.F.I.P.</small>
                                    @if($errors->has('rsocial'))
                                        <small class="form-text text-danger">{{$errors->first('rsocial')}}</small>
                                    @endif
                                </div>
                            </div>
                            {{-- Tipo de docum --}}
                            <div class="col-2">
                                <div class="form-group">
                                <label for="documento">Documento fiscal</label>
                                <select class="form-control" name="documento" id="documento" required>
                                    <option value="">Seleccionar</option>
                                    @foreach($documento as $d)
                                <option value="{{$d->tdid}}" {{ $cliente->clicatdoc == $d->tdid ? 'selected' : '' }}>{{$d->tddes}}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">D.N.I. - C.U.I.T.</small>
                                @if($errors->has('documento'))
                                    <small class="form-text text-danger">{{$errors->first('documento')}}</small>
                                @endif
                                </div>
                            </div>
                            {{-- Numero de documento --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="numdoc">Núm. Doc.</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="numdoc" id="numdoc" value="{{!$errors->has('numdoc') ? $cliente->clicuit : old('numdoc')}}" class="form-control {{$errors->has('numdoc') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" required>
                                    </div>
                                    <small id="helpId" class="text-muted">Sin puntos o guiones</small>
                                    @if($errors->has('numdoc'))
                                        <small class="form-text text-danger">{{$errors->first('numdoc')}}</small>
                                    @endif
                                </div>
                            </div>
