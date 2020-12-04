<div class="tab-pane fade show active" id="precios" role="tabpanel" aria-labelledby="precios-tab">
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <legend class="text-info">Cambio de precios</legend>
            </div>
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="prarticulo">Artículo</label>
                            <select class="selectpicker form-control col-12" data-live-search="true" name="prarticulo" id="prarticulo">
                                <option value="">Seleccionar artículo</option>
                                @foreach($articulos as $a)
                                    <option value="{{$a->idart}}">{{$a->idart }} | {{$a->artdes }} | {{$a->codbar }} | {{$a->cant }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- FORMULARIO --}}
                @include('partials.precios.formularios.precios')
            </form>
        </div>
    </div>
</div>
