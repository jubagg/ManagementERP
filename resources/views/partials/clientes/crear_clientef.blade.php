<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="crear-cliente" role="tabpanel" aria-labelledby="crear-cliente-tab">
        {{-- FORMULARIO --}}
        <form action="{{route('clientes.update')}}" method="post">
            {{-- {{csrf_field()}} --}}
            @csrf
            <input type="hidden" name="action" value="crear">
            <div class="card">
                {{-- CARD --}}
                <div class="card-body">
                    {{-- PRIMERA CABECERA (RESUMEN DE DATOS ) --}}
{{--                     <div class="row">
                        <div class="col-12 text-right">
                            <a href="#" class="btn btn-light mb-2">
                                <i class="fas fa-money-bill"></i>
                                Saldo en cuenta: {{$a}}
                            </a>
                            <a href="#" class="btn btn-light mb-2">
                                <i class="fas fa-file-alt"></i>
                                Ultima factura: {{$a }}
                            </a>
                        </div>
                    </div> --}}
                    {{-- SEGUNDA PARTE, DATOS PRIMARIOS --}}
                    <div class="col-12">
                        {{-- LINEA 1 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Información principal de cliente</legend>
                            @include('partials.clientes.crearf.linea1')
                        </div>
                        {{-- LINEA 2 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Información de contacto y facturación</legend>
                            @include('partials.clientes.crearf.linea2')
                        </div>
                        {{-- LINEA 3  --}}
                        <div class="form-row">
                            <legend class="text-black-50">Datos comerciales</legend>
                            @include('partials.clientes.crearf.linea3')
                        </div>
                        {{-- LINEA 4 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Impuestos</legend>
                            @include('partials.clientes.crearf.linea4')
                        </div>
                        {{-- LINEA 5 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Varios</legend>
                            {{-- Fecha de alta --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="alta">Fecha alta</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="alta" id="alta" class="form-control" placeholder="" aria-describedby="helpId" disabled >
                                    </div>
                                </div>
                            </div>
                            {{-- Fecha de mod --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="alta">Ultima modificación</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="mod" id="mod" class="form-control" placeholder="" aria-describedby="helpId" disabled >
                                    </div>
                                </div>
                            </div>
                             {{-- Fecha desactivado --}}
                             <div class="col-3">
                                <div class="form-group">
                                    <label for="alta">Fecha desactivado</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt fa-fw"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="baja" id="baja" class="form-control" placeholder="" aria-describedby="helpId" disabled >
                                    </div>
                                </div>
                            </div>
                            {{-- descativado --}}
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <div class="form-check">
                                    <label class="form-check-label m-1">
                                        <input type="checkbox" class="form-check-input" name="inactive" id="inactive" value="1" >
                                        Desactivar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                <label for="obs">Observaciones</label>
                                <textarea class="form-control" name="obs" id="obs" rows="3" value="{{old('obs')}}"></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- LINEA 5 --}}
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
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
  </div>

@include('localidad.ajax.crear_locmod')


