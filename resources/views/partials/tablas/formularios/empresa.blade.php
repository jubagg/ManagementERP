<div class="tab-pane fade show  {{(session('valortab') == 'empresa' ) ? 'active' : ''}}" id="tablasemp" role="tabpanel" aria-labelledby="tablasemp-tab">
    {{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                {{-- Empresa --}}
                <div class="col-12">
                    <table class="table table-sm" id="tablasempresa" style="cursor: pointer">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Empresa</th>
                                <th>C.U.I.T.</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Ferr.</th>
                                <th>Electrod.</th>
                                <th>Fabr.</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Empresa::getAll() as $e)
                            <tr>
                                <td scope="row">{{$e->empid}}</td>
                                <td>{{$e->empnom}}</td>
                                <td>{{$e->empcuit}}</td>
                                <td>{{$e->empdir}}</td>
                                <td>{{$e->emptel}}</td>
                                <td>{{$e->empmail}}</td>
                                <td>{{$e->empartmodferreteria}}</td>
                                <td>{{$e->empartmodelectrodom}}</td>
                                <td>{{$e->empartfabrica}}</td>
                                <td><a class="btn btn-danger btn-sm" href={{route('tablas.empresas.eliminar' , $e->empid)}}><i class="fas fa-trash-alt "></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form action="{{route('tablas.empresas.guardar')}}" method="post">
                    @csrf
                    <div class="card col-12">
                        <div class="card-body">
                            <legend class="h5">Modificar datos de empresa</legend>
                            <hr>
                            <input type="hidden" class="form-control" name="empid" id="empid" placeholder="" value="">
                            <div class="form-row">
                                <div class="col-3">
                                    <div class="form-group">
                                    <label for="empnom"><strong>Nombre empresa</strong></label>
                                    <input type="text"
                                        class="form-control" name="empnom" id="empnom" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                    <label for="empcuit"><strong>C.U.I.T.</strong></label>
                                    <input type="text"
                                        class="form-control" name="empcuit" id="empcuit" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                    <label for="empdir"><strong>Dirección</strong></label>
                                    <input type="text"
                                        class="form-control" name="empdir" id="empdir" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                    <label for="emptel"><strong>Teléfono</strong></label>
                                    <input type="text"
                                        class="form-control" name="emptel" id="emptel" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                    <label for="empmail"><strong>Correo</strong></label>
                                    <input type="text"
                                        class="form-control" name="empmail" id="empmail" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col text-right">
                                    <div class="col">
                                        <a href="">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-window-close fa-fw" aria-hidden="true"></i>
                                                <span class="d-none d-inline-block">Cancelar</span>
                                            </button>
                                        </a>
                                        <button class="btn btn-secondary" type="reset">
                                            <i class="fas fa-undo fa-fw" aria-hidden="true"></i>
                                            <span class="d-none d-inline-block">Deshacer</span>
                                        </button>
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-save fa-fw" aria-hidden="true"></i>
                                            <span class="d-none d-inline-block">Guardar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
