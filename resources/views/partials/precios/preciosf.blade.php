<div class="tab-pane fade show active" id="precios" role="tabpanel" aria-labelledby="precios-tab">
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <legend class="text-info">Cambio de precios</legend>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Artículo</label>
                        <select class="selectpicker form-control col-12" data-live-search="true">
                            <option value=""></option>
                            @foreach($articulos as $a)
                                <option value="{{$a->idart}}">{{$a->idart }} | {{$a->artdes }} | {{$a->codbar }} | {{$a->cant }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <form action="" method="post">

            </form>
        </div>
    </div>
</div>
