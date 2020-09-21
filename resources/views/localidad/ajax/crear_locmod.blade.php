<div class="modal fade" id="modalLocalidad" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header text-right m-0 col-12">
                    <div class="col-6">
                    </div>
                    <div class="text-right">
                        <h1 class=" h4 d-none d-inline-block">
                            Localidades
                            <br>
                            <small class="text-info">Nueva localidad</small>
                        </h1>
                    </div>
                <div class="">
                    <div class="d-none d-inline-block">
                        <i class="fas fa-map-marked-alt fa-3x"></i>
                    </div>
                </div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="formLocalidad">
                    {{csrf_field()}}
                    <div class="form-group" id="divlocalidad">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad" name="localidad" placeholder=""/>
                    </div>
                    <div class="form-group" id="divabr">
                        <label for="abr">Abreviación</label>
                        <input type="text" class="form-control" id="abr" placeholder="Ej.: DAR"/>
                        <small id="helpId" class="form-text text-muted">Debe ingresar 3 carácteres</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="guardarLocalidad">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
