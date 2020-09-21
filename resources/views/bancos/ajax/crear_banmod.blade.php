<div class="modal fade" id="modalBanco" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header text-right m-0 col-12">
                    <div class="col-6">
                    </div>
                    <div class="text-right">
                        <h1 class=" h4 d-none d-inline-block">
                            Bancos
                            <br>
                            <small class="text-info">Nuevo banco</small>
                        </h1>
                    </div>
                <div class="">
                    <div class="d-none d-inline-block">
                        <i class="fas fa-university fa-3x"></i>
                    </div>
                </div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <input type="hidden" class="form-control" name="bancoscrear" id="bancoscrear" value="{{route('bancos.ajax.guardar')}}">
                <input type="hidden" class="form-control" name="bancoslistadom" id="bancoslistadom" value="{{route('bancos.ajax.listado')}}">
                <form role="form" id="formBanco">
                    {{csrf_field()}}
                    <div class="form-group" id="divbancos">
                        <label for="bancos">Banco</label>
                        <input type="text" class="form-control" id="bancos" name="bancos" placeholder=""/>
                    </div>
                    <div class="form-group" id="divbabr">
                        <label for="babr">Abreviación</label>
                        <input type="text" class="form-control" name="babr" id="babr" placeholder="Ej.: FRA"/>
                        <small id="helpId" class="form-text text-muted">Debe ingresar 3 carácteres</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" id="guardarBanco">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
