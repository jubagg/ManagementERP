                            {{-- Categoria iibb --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="catiibb">Categoria I.I.B.B.</label>
                                  <select class="form-control" name="catiibb" id="catiibb">
                                    <option value="">Seleccionar</option>
                                    @foreach($iibb as $ib)
                                    <option value="{{$ib->ibid}}" {{ $cliente->clicatiibb == $ib->ibid ? 'selected' : '' }}>{{$ib->ibdes}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            {{-- iibb --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="iibb">Número IIBB</label>
                                    <input type="text" class="form-control" name="iibb" id="iibb" aria-describedby="helpId" placeholder="" value="{{!$errors->has('iibb') ? $cliente->cliiibb : old('iibb')}}">
                                </div>
                            </div>
                            {{-- Categoria ganancias --}}
                            <div class="col-2">
                                <div class="form-group">
                                  <label for="catgan">Categoria ganancias</label>
                                  <select class="form-control" name="catgan" id="catgan">
                                    <option value="">Seleccionar</option>
                                    @foreach($ganancias as $cg)
                                    <option value="{{$cg->cgid}}" {{ $cliente->clicatgan == $cg->cgid ? 'selected' : '' }}>{{$cg->cgdes}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
