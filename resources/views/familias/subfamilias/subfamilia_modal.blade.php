<div class="modal fade" id="modalArtSubfamilia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header text-right m-0 col-12">
                    <div class="col-6">
                    </div>
                    <div class="text-right">
                        <h1 class=" h4 d-none d-inline-block">
                            Subfamilias
                            <br>
                            <small class="text-info">Nueva subfamilia</small>
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
                <input type="hidden" class="form-control" name="rutasubfamiliacrear" id="rutasubfamiliacrear" value="{{route('subfamilias.crear')}}">
                <input type="hidden" class="form-control" name="rutasubfamilialistado" id="rutasubfamilialistado" value="{{route('subfamilias.listado')}}">
                <form role="form" id="formularioSubfamiliasModal">
                    {{csrf_field()}}
                    <div class="form-group" id="dividartsubfamilia">
                        <label for="artidsubfamilia">Identificación</label>
                        <input type="text" class="form-control" id="artidsubfamilia" name="artidsubfamilia" placeholder="Ej.: 001, 002, F01"/>
                        <small id="helpId" class="form-text text-muted">Código interno del sistema</small>
                    </div>
                    <div class="form-group">
                      <label for="artfam2">Familia de artículo</label>
                      <div class="input-group">
                        <select class="form-control" name="artfam2" id="artfam2" onchange="selectdevolucion()">
                            <option value="">Seleccionar</option>
                            @foreach($familia as $f)
                            <option value="{{$f->afid}}" >{{$f->afdesc}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group" id="divartsubfamilia">
                        <label for="artsubfamilia">Subfamilia</label>
                        <input type="text" class="form-control" id="artsubfamilia" name="artsubfamilia" placeholder="Ej.: Snacks salados"/>
                    </div>
                    <div class="form-group" id="divabrsubfamilia">
                        <label for="abrsubfamilia">Abreviación</label>
                        <input type="text" class="form-control" name="abrsubfamilia" id="abrsubfamilia" placeholder="Ej.: GOL"/>
                        <small id="helpId" class="form-text text-muted">Debe ingresar 3 carácteres</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="guardarSubfamiliaModal" id="guardarSubfamiliaModal"  >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
