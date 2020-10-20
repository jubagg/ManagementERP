<div class="tab-pane fade show  {{session('valortab') == 'usuarios' ? 'active' : ''}}" id="usuarios" role="tabpanel" aria-labelledby="usuarios">
    {{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                {{-- Empresa --}}
                <div class="col-6  border table-responsive">
                    <table class="table table-sm table-hover" id="tablasusuarios" style="cursor: pointer">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( App\User::all() as $u)
                            <tr>
                                <td scope="row">{{$u->id}}</td>
                                <td>{{$u->user}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->role}}</td>
                                <td>{{$u->email}}</td>
                                <td><a class="btn btn-danger btn-sm" href={{route('tablas.usuario.eliminar' , $u->sid)}}><i class="fas fa-trash-alt "></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class ="col-6">
                    <form action="{{route('tablas.usuario.guardar')}}" method="post">
                    @csrf
                        <div class="card col-12">
                            <div class="card-body">
                                <legend class="h5">Nuevo usuario</legend>
                                <hr>
                                <input type="hidden" class="form-control" name="userid" id="userid" placeholder="" value="">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="user"><strong>Usuario</strong></label>
                                            <input type="text" class="form-control {{$errors->has('user') ? 'is-invalid' : ''}}" name="user" id="user" aria-describedby="helpId" placeholder="" value="{{$errors->has('user') ? '' : old('user')}}">
                                            @if($errors->has('user'))
                                                <small class="form-text text-danger">{{$errors->first('user')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name"><strong>Nombre</strong></label>
                                            <input type="text"
                                            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" aria-describedby="helpId" placeholder="" value="{{$errors->has('name') ? '' : old('name')}}">
                                            @if($errors->has('name'))
                                                <small class="form-text text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password"><strong>Contraseña</strong></label>
                                            <input type="password"
                                            class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" aria-describedby="helpId" placeholder="" value="{{$errors->has('password') ? '' : old('password')}}">
                                            @if($errors->has('password'))
                                                <small class="form-text text-danger">{{$errors->first('password')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email"><strong>Correo</strong></label>
                                            <input type="email"
                                            class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email" aria-describedby="helpId" placeholder="" value="{{$errors->has('email') ? '' : old('email')}}">
                                            @if($errors->has('email'))
                                                <small class="form-text text-danger">{{$errors->first('email')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="role">Rol del usuario</label>
                                  <select class="form-control" name="role" id="role">
                                    <option>Seleccionar</option>
                                    @foreach(\Roles::getAll() as $r)
                                        <option value="{{$r->rid}}">{{$r->rdesc}}</option>
                                    @endforeach
                                  </select>
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
