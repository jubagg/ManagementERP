<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="crear-movimiento" role="tabpanel" aria-labelledby="crear-movimiento-tab">
        <input type="hidden" class="form-control" name="codartstkroute" id="codartstkroute" value="{{route('stock.movimientos.articulos')}}">
        {{-- FORMULARIO --}}
        <form action="{{route('stock.movimientos.guardar')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    {{-- tipo movimiento --}}
                    <div class="form-row">
                        {{-- Tipo movimiento  fila--}}
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tipmovstk">Tipo de movimiento</label>
                                <select class="form-control" name="tipmovstk" id="tipmovstk">
                                    <option>Seleccionar</option>
                                    @foreach($tiposmov as $tm)
                                        <option value="{{$tm->movid}}">{{$tm->movid.' | '.$tm->movdesc}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- datos de cabecera --}}
                    @include('partials.stock.var.cabgral')
                    <div id="variableproveedor">
                        @include('partials.stock.var.cabprov')
                    </div>
                    <div id='variabledepositos' >
                        @include('partials.stock.var.cabendep')
                    </div>
                    <hr>
                    <div class="form-row">
                        <legend>Detalle de comprobante</legend>
                        <div class="col-3">
                            <div class="form-group">
                              <label for="">Código de artículo</label>
                              <input type="text"
                                class="form-control" name="codartstk" id="codartstk" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                              <label for="">Cantidad</label>
                              <input type="text"
                                class="form-control" name="codcantstk" id="codcantstk" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                              <label for="">Precio</label>
                              <input type="text"
                                class="form-control" name="codprecstk" id="codprecstk" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div id="alert"></div>

                    <input type="hidden" class="form-control" name="tabladatos" id="tabladatos" value="">
                    <div>
                        <div id="example-table">
                            {{-- tabla --}}
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="tab-pane fade" id="movimientos-stock" role="tabpanel" aria-labelledby="movimientos-stock-tab">

    </div>
  </div>


