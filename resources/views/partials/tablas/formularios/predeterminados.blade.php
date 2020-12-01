<div class="tab-pane fade show  {{(session('valortab') == 'predet' ) ? 'active' : ''}}" id="predet" role="tabpanel" aria-labelledby="predet-tab">
    <div class="card">
        <div class="card-body">
            <input type="hidden" class="form-control" name="preruta" id="preruta" value="{{route('tablas.predet.buscar')}}">
            <form action="{{route('tablas.predet.guardar')}}" method="POST" id="preform">
                @csrf
                <legend>Predeterminados de estaciones </legend>
                <div class="form-row">
                    <div class="col-3">
                        <div class="form-group">
                        <label for="est">Estacion</label>
                        <select class="form-control" name="est" id="est" required>
                            <option></option>
                            @foreach(Estaciones::getAll() as $e)
                                <option value="{{$e->id}}">{{$e->estnombre}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-3">
                        <div class="form-group">
                        <label for="suc">Sucursal</label>
                        <select class="form-control" name="suc" id="suc" required>
                            <option></option>
                            @foreach(Sucursales::getAll() as $s)
                                <option value="{{$s->sid}}">{{$s->sdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="caja">Caja</label>
                        <select class="form-control" name="caja" id="caja" required>
                            <option></option>
                            @foreach(\Cajas::getAll() as $c)
                                <option value="{{$c->cajid}}">{{$c->cajdesc}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="deposito">Deposito</label>
                        <select class="form-control" name="deposito" id="deposito" required>
                            <option></option>
                            @foreach(\Depositos::getDepositos() as $d)
                                <option value="{{$d->depid}}">{{$d->depdesc}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="venta">Venta</label>
                        <select class="form-control" name="venta" id="venta" required>
                            <option></option>
                            @foreach(\ConVen::getAll() as $cv)
                                <option value="{{$cv->cvid}}">{{$cv->cvdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="listpre">Lista precios</label>
                        <select class="form-control" name="listpre" id="listpre" required>
                            <option></option>
                            @foreach(\ListaPrecios::getAll() as $lp)
                                <option value="{{$lp->lpid}}">{{$lp->lpdesc}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-3">
                        <div class="form-group">
                        <label for="pedidos">C.E. Pedidos</label>
                        <select class="form-control" name="pedidos" id="pedidos" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="remitos">C.E. Remitos</label>
                        <select class="form-control" name="remitos" id="remitos" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="facta">C.E. Factura A</label>
                        <select class="form-control" name="facta" id="facta" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="factb">C.E. Factura B</label>
                        <select class="form-control" name="factb" id="factb" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ndeba">C.E. Nota Débito A</label>
                        <select class="form-control" name="ndeba" id="ndeba" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ndebb">C.E. Nota Débito B</label>
                        <select class="form-control" name="ndebb" id="ndebb" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ncredb">C.E. Nota Crédito B</label>
                        <select class="form-control" name="ncredb" id="ncredb" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ncreda">C.E. Nota Crédito A</label>
                        <select class="form-control" name="ncreda" id="ncreda" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="movstk">C.E. Movim. Stock</label>
                        <select class="form-control" name="movstk" id="movstk" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="presu">C.E. Presupuesto</label>
                        <select class="form-control" name="presu" id="presu" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="cobranzas">C.E. Cobranzas</label>
                        <select class="form-control" name="cobranzas" id="cobranzas" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ordcom">C.E. Orden compra</label>
                        <select class="form-control" name="ordcom" id="ordcom" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="ordvta">C.E. Orden venta</label>
                        <select class="form-control" name="ordvta" id="ordvta" required>
                            <option>Seleccionar</option>
                            @foreach(\Emisores::getAll() as $em)
                                <option value="{{$em->cemid}}">{{$em->cemdes}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col text-right">
                        <div class="col">
                            <button class="btn btn-secondary" type="reset" id='borrarpred'>
                                <i class="fas fa-undo fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-inline-block">Deshacer</span>
                            </button>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-save fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-inline-block">Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
