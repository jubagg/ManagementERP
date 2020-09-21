                            {{-- Direción --}}
                            <div class="col-3">
                                <div class="form-group">
                                      <label for="dir">Dirección</label>
                                      <input type="text" name="dir" id="dir" class="form-control" placeholder="" aria-describedby="helpId" value="{{!$errors->has('dir') ? $cliente->clidir : old('dir')}}">
                                    </div>
                            </div>
                            {{-- Pais --}}
                            <div class="col-3">
                                    <div class="form-group">
                                      <label for="pais">País</label>
                                      <select class="form-control" name="pais" id="pais">
                                        <option value="">Seleccionar</option>
                                        @foreach($pais as $p)
                                        <option value="{{$p->pid}}" {{ $cliente->clipais == $p->pid ? 'selected' : '' }}>{{$p->pdes}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                            </div>
                            {{-- Provincia --}}
                            <div class="col-3">
                                    <div class="form-group">
                                      <label for="prov">Provincia</label>
                                      <select class="form-control" name="prov" id="prov">
                                        <option value="">Seleccionar</option>
                                        @foreach($provincia as $p)
                                        <option value="{{$p->prid}}" {{ $cliente->cliprov == $p->prid ? 'selected' : '' }}>{{$p->prdes}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                            </div>
                            {{-- Localidad --}}
                            <div class="col-3">
                                <div class="form-group">
                                  <label for="loc">Localidad</label>
                                  <div class="input-group">
                                    <select class="form-control" name="loc" id="loc">
                                        <option value="">Seleccionar</option>
                                        @foreach($localidad as $l)
                                        <option value="{{$l->lid}}" {{ $cliente->cliloc == $l->lid ? 'selected' : '' }}>{{$l->ldesc}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalLocalidad" href="#modalLocalidad">
                                             <i class="fas fa-plus fa-fw"></i>
                                        </button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- Codigo postal --}}
                            <div class="col-3">
                                    <div class="form-group">
                                        <label for="cp">Código postal</label>
                                        <input type="text" class="form-control" name="cp" id="cp" aria-describedby="helpId" placeholder="" value="{{!$errors->has('cp') ? $cliente->clicp : old('cp')}}">
                                    </div>
                            </div>
                            {{-- Telefono --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone-square-alt fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" aria-describedby="helpId" value="{{!$errors->has('telefono') ? $cliente->clitel : old('telefono')}}">
                                    </div>
                                </div>
                            </div>
                            {{-- Web --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="web">Web</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="web" id="web" class="form-control" placeholder="" aria-describedby="helpId" value="{{!$errors->has('web') ? $cliente->cliweb : old('web')}}" >
                                    </div>
                                </div>
                            </div>
                            {{-- MAIL --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="mail">Correo Electrónico</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="mail" name="mail" id="mail" class="form-control {{$errors->has('mail') ? 'is-invalid' : ''}}" placeholder="" aria-describedby="helpId" value="{{!$errors->has('mail') ? $cliente->cliemail : old('mail')}}">
                                    </div>
                                    @if($errors->has('mail'))
                                        <small class="form-text text-danger">{{$errors->first('mail')}}</small>
                                    @endif
                                </div>
                            </div>
