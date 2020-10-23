<div class="tab-pane fade show  {{session('valortab') == 'terminales' ? 'active' : ''}}" id="terminales" role="tabpanel" aria-labelledby="terminales">
    {{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                {{-- Empresa --}}
                <div class="col-7  border" style=" overflow:scroll;">
                    <table class="table table-sm table-hover" id="tablasestaciones" style="cursor: pointer;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Terminal</th>
                                <th>Nombre de red</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( \Estaciones::getAll() as $e)
                            <tr>
                                <td scope="row">{{$e->id}}</td>
                                <td>{{$e->estnombre}}</td>
                                <td>{{$e->estnomred}}</td>

                                <td><a class="btn btn-danger btn-sm" href={{route('tablas.estacion.eliminar' , $e->id)}}><i class="fas fa-trash-alt "></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class ="col-5">
                    <form action="{{route('tablas.estacion.guardar')}}" method="post">
                    @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <legend class="h5">Nueva estación</legend>
                                <hr>
                                <input type="hidden" class="form-control" name="estid" id="estid" placeholder="" value="">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="estnom"><strong>Estación</strong></label>
                                            <input type="text" class="form-control {{$errors->has('estnom') ? 'is-invalid' : ''}}" name="estnom" id="estnom" aria-describedby="helpId" placeholder="" value="{{$errors->has('estnom') ? '' : old('estnom')}}">
                                            @if($errors->has('estnom'))
                                                <small class="form-text text-danger">{{$errors->first('estnom')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="estred"><strong>Nombre de red</strong></label>
                                            <input type="text"
                                            class="form-control {{$errors->has('estred') ? 'is-invalid' : ''}}" name="estred" id="estred" aria-describedby="helpId" placeholder="" value="{{$errors->has('estred') ? '' : old('estred')}}">
                                            @if($errors->has('estred'))
                                                <small class="form-text text-danger">{{$errors->first('estred')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col text-right">
                                        <div class="col">
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
</div>
