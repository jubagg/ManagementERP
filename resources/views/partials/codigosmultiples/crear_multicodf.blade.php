<div>
    <legend>Nuevo código - {{$articulo->artdesc}}</legend>
<form action="{{route('articulos.codigosmulti.guardar')}}" method="post">
    <div class="card">
        <div class=" card-body">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" name="artcod" id="artcod" placeholder="" value="{{$articulo->artcod}}">
            </div>
            <div class="form-row">
                <div class="col-4">

                    <div class="form-group ">
                        <label for="">codigo</label>
                        <input type="text"
                          class="form-control" name="codigo" id="codigo" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">codigo</small>
                      </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Descripción alternativa</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">descripcion </small>
                      </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Cantidad de artículos</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <div class="form-group form-inline">
                        <button type="submit" class="btn btn-success "> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div class="mt-2">
    <legend>Listado</legend>
    @include('partials.codigosmultiples.listado_multicod')
</div>



