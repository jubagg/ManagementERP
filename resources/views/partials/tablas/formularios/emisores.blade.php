<div class="tab-pane fade show  {{(session('valortab') == 'emisores' ) ? 'active' : ''}}" id="emisores" role="tabpanel" aria-labelledby="emisores-tab">
    {{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                {{-- Emisor --}}
                <input type="hidden" class="form-control" name="numruta" id="numruta" value="{{route('tablas.emisores.numeracion')}}">
                <input type="hidden" class="form-control" name="emiruta" id="emiruta" value="{{route('tablas.emisores.buscar')}}">
                <div class="col-7  border" style="overflow:scroll">
                    <table class="table table-sm table-hover" id="tablaemisores" style="cursor: pointer;">
                        <thead>
                            <tr>
                                <th>C.Em.</th>
                                <th>Descripción</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\Emisores::getAll() as $u)
                            <tr>
                                <td scope="row">{{$u->cemid}}</td>
                                <td>{{$u->cemdes}}</td>
                                <td><a class="btn btn-danger btn-sm" href={{route('tablas.emisores.eliminar' , $u->cemid)}}><i class="fas fa-trash-alt "></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class ="col-5">
                    <form action="{{route('tablas.emisores.guardar')}}" method="post">
                    @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <legend class="h5">Nuevo centro emisor</legend>
                                <hr>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cemid">Número centro emisor</label>
                                            <input type="text" class="form-control {{$errors->has('cemid') ? 'is-invalid' : ''}}" name="cemid" id="cemid" aria-describedby="helpId" placeholder="" value="{{$errors->has('cemid') ? '' : old('cemid')}}">
                                            @if($errors->has('cemid'))
                                                <small class="form-text text-danger">{{$errors->first('cemid')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cemdes">Nombre emisor</label>
                                            <input type="text" class="form-control {{$errors->has('cemdes') ? 'is-invalid' : ''}}" name="cemdes" id="cemdes" aria-describedby="helpId" placeholder="" value="{{$errors->has('cemdes') ? '' : old('cemdes')}}">
                                            @if($errors->has('cemdes'))
                                                <small class="form-text text-danger">{{$errors->first('cemdes')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="cemmarca">Marca contr.</label>
                                            <select class="form-control" name="cemmarca" id="cemmarca">
                                              <option>Seleccionar</option>
                                              @foreach(\MarcasEmisores::getAll() as $me)
                                                  <option value="{{$me->marid}}" {{$me->marid == old('cemmarca') ? 'selected': ''}}>{{$me->mardesc}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cemcola">Cola imp.</label>
                                            <select class="form-control" name="cemcola" id="cemcola">
                                                  <option value="1" {{1 == old('cemcola') ? 'selected': ''}}>Si</option>
                                                  <option value="0" {{0 == old('cemcola') ? 'selected': ''}}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cemport">Puerto COM</label>
                                            <input type="text"
                                            class="form-control {{$errors->has('cemport') ? 'is-invalid' : ''}}" name="cemport" id="cemport" aria-describedby="helpId" placeholder="" value="{{$errors->has('cemport') ? '' : old('cemport')}}">
                                            @if($errors->has('cemport'))
                                                <small class="form-text text-danger">{{$errors->first('cemport')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cembaud">Buadios</label>
                                            <input type="text"
                                            class="form-control {{$errors->has('cembaud') ? 'is-invalid' : ''}}" name="cembaud" id="cembaud" aria-describedby="helpId" placeholder="" value="{{$errors->has('cembaud') ? '' : old('cembaud')}}">
                                            @if($errors->has('cembaud'))
                                                <small class="form-text text-danger">{{$errors->first('cembaud')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cemmonmax">Monto máximo</label>
                                            <input type="text"
                                            class="form-control {{$errors->has('cemmonmax') ? 'is-invalid' : ''}}" name="cemmonmax" id="cemmonmax" aria-describedby="helpId" placeholder="" value="{{$errors->has('cemmonmax') ? '' : old('cemmonmax')}}">
                                            @if($errors->has('cemmonmax'))
                                                <small class="form-text text-danger">{{$errors->first('cemmonmax')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 card col-12 pb-1">
                    <legend>Comprobantes y reportes </legend>
                    <div>
                        <input type="hidden" class="form-control" name="numeraciondatos" id="numeraciondatos" value="">
                        <input type="hidden" class="form-control" name="action" id="action" value="crear">
                        <div id="comprobantestab">
                            {{-- tabla --}}
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col text-right">
                        <div class="col">
                            <button class="btn btn-secondary" type="reset" id='borraremisores'>
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
                </form>
            </div>
        </div>
    </div>

