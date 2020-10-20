
<div class="tab-pane fade show  {{session('valortab') == 'sucursales' ? 'active' : ''}}" id="sucursales" role="tabpanel" aria-labelledby="sucursales">
    {{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                {{-- Empresa --}}
                <div class="col-6  border">
                    <table class="table table-sm" id="tablassucursal" style="cursor: pointer">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Sucursal</th>
                                <th>Abr.</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Sucursales::getAll() as $s)
                            <tr>
                                <td scope="row">{{$s->sid}}</td>
                                <td>{{$s->sdes}}</td>
                                <td>{{$s->sabr}}</td>
                                <td><a class="btn btn-danger btn-sm" href={{route('tablas.sucursales.eliminar' , $s->sid)}}><i class="fas fa-trash-alt "></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class ="col-6">
                    <form action="{{route('tablas.sucursales.guardar')}}" method="post">
                    @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <legend class="h5">Nueva sucursal</legend>
                                <hr>
                                <input type="hidden" class="form-control" name="sucid" id="sucid" placeholder="" value="">
                                <input type="hidden" class="form-control" name="valortab" id="valortab" placeholder="" value="sucursales">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sucnom"><strong>Descripción</strong></label>
                                            <input type="text" class="form-control {{$errors->has('sucnom') ? 'is-invalid' : ''}}" name="sucnom" id="sucnom" aria-describedby="helpId" placeholder="" value="{{$errors->has('sucnom') ? '' : old('sucnom')}}">
                                            @if($errors->has('sucnom'))
                                                <small class="form-text text-danger">{{$errors->first('sucnom')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sucabr"><strong>Abreviación</strong></label>
                                            <input type="text"
                                            class="form-control {{$errors->has('sucabr') ? 'is-invalid' : ''}}" name="sucabr" id="sucabr" aria-describedby="helpId" placeholder="" value="{{$errors->has('sucabr') ? '' : old('sucabr')}}">
                                            @if($errors->has('sucabr'))
                                                <small class="form-text text-danger">{{$errors->first('sucabr')}}</small>
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
