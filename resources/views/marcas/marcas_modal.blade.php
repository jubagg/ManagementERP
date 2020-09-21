<div class="modal fade" id="modalArtMarca" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header text-right m-0 col-12">
                    <div class="col-6">
                    </div>
                    <div class="text-right">
                        <h1 class=" h4 d-none d-inline-block">
                            Marcas
                            <br>
                            <small class="text-info">Nueva marca</small>
                        </h1>
                    </div>
                <div class="">
                    <div class="d-none d-inline-block">
                        <i class="far fa-bookmark fa-3x"></i>
                    </div>
                </div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <input type="hidden" class="form-control" name="rutamarcacrear" id="rutamarcacrear" value="{{route('marcas.crear')}}">
                <input type="hidden" class="form-control" name="rutamarcalistado" id="rutamarcalistado" value="{{route('marcas.listado')}}">
                <form role="form" id="formularioMarcasModal">
                    {{csrf_field()}}
                    <div class="form-group" id="dividartmarca">
                        <label for="artidmarca">Identificación</label>
                        <input type="text" class="form-control" id="artidmarca" name="artidmarca" placeholder="Ej.: 001, 002, F01"/>
                        <small id="helpId" class="form-text text-muted">Código interno del sistema</small>
                    </div>
                    <div class="form-group" id="divartmarca">
                        <label for="artmarca">Marca</label>
                        <input type="text" class="form-control" id="artmarca" name="artmarca" placeholder="Matarazzo"/>
                    </div>
                    <div class="form-group" id="divabrmarca">
                        <label for="abrmarca">Abreviación</label>
                        <input type="text" class="form-control" name="abrmarca" id="abrmarca" placeholder="Ej.: KNO"/>
                        <small id="helpId" class="form-text text-muted">Debe ingresar 3 carácteres</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="guardarMarcaModal" id="guardarMarcaModal" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
