<div class="container-fluid">
    <div class="row">
        <div class="col-7 justify-content-center text-center d-flex">
            <div class="form-group form-inline">
                <label for="buscador" class="mx-4">Buscador</label>
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-search fa-fw"></i>
                        </span>
                    </div>
                    <input type="text" name="buscador" id="buscador"  class="form-control " placeholder="" aria-describedby="helpId">
                </div>
{{--                 <small id="helpId" class="text-muted">Valor de sistema</small> --}}
            </div>
        </div>
        <div class="col-4 text-right">
            <h1 class=" h4 d-none d-inline-block">
                Listado de artículos
                <br>
                <small class="text-info">Listado</small>
            </h1>
        </div>
        <div class="col-1 text-center">
            <div class="d-none d-inline-block">
                <i class="{{$icon}} fa-3x"></i>
            </div>
        </div>
    </div>
</div>
