<div class="modal fade" id="modalArtFamilia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header text-right m-0 col-12">
                    <div class="col-6">
                    </div>
                    <div class="text-right">
                        <h1 class=" h4 d-none d-inline-block">
                            Familias
                            <br>
                            <small class="text-info">Nueva familia</small>
                        </h1>
                    </div>
                <div class="">
                    <div class="d-none d-inline-block">
                        <i class="fas fa-boxes fa-3x"></i>
                    </div>
                </div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <input type="hidden" class="form-control" name="rutafamiliacrear" id="rutafamiliacrear" value="{{route('familias.crear')}}">
                <input type="hidden" class="form-control" name="rutafamilialistado" id="rutafamilialistado" value="{{route('familias.listado')}}">
                <form role="form" id="formularioFamiliasModal">
                    {{csrf_field()}}
                    <div class="form-group" id="dividartfamilia">
                        <label for="artidfamilia">Identificación</label>
                        <input type="text" class="form-control" id="artidfamilia" name="artidfamilia" placeholder="Ej.: 001, 002, F01"/>
                        <small id="helpId" class="form-text text-muted">Código interno del sistema</small>
                    </div>
                    <div class="form-group" id="divartfamilia">
                        <label for="artfamilia">Familia</label>
                        <input type="text" class="form-control" id="artfamilia" name="artfamilia" placeholder="Golosinas"/>
                    </div>
                    <div class="form-group" id="divabrfamilia">
                        <label for="abrfamilia">Abreviación</label>
                        <input type="text" class="form-control" name="abrfamilia" id="abrfamilia" placeholder="Ej.: GOL"/>
                        <small id="helpId" class="form-text text-muted">Debe ingresar 3 carácteres</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="guardarFamiliaModal" id="guardarFamiliaModal"  >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
