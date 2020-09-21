<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="crear-articulos" role="tabpanel" aria-labelledby="crear-articulos-tab">
        {{-- FORMULARIO --}}

        <form action="{{route('articulos.update')}}" method="post">
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
                        {{-- LINEA 1 datos escenciales--}}
                        <div class="form-row">
                            <legend class="text-black-50">Datos del artículo</legend>
                            @include('partials.articulos.crearf.datos_articulo')
                        </div>
                        {{-- LINEA 2 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Codificación</legend>
                            @include('partials.articulos.crearf.datos_codigos')
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-check">
                                    <label class="form-check-label m-1">
                                        <input type="checkbox" class="form-check-input" name="artconbar" id="artconbar" value="1" {{old('artconbar') == 1 ? 'checked' : ''}}>
                                        Control de código de barras
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- LINEA 3  --}}
                        <div class="form-row">
                            <legend class="text-black-50">Clasificación</legend>
                            @include('partials.articulos.crearf.datos_clasificacion')
                        </div>
                        {{-- LINEA 4 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Datos comerciales</legend>
                            @include('partials.articulos.crearf.datos_comerciales')
                        </div>
                        {{-- LINEA 5 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Datos de stock</legend>
                            @include('partials.articulos.crearf.datos_stock')
                            {{-- fracionamiento --}}
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-check">
                                    <label class="form-check-label m-1">
                                        <input type="checkbox" class="form-check-input" name="artfrac" id="artfrac" value="1" {{old('artfrac') == 1 ? 'checked' : ''}}>
                                        Permitir fraccionamiento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <div class="form-check">
                                    <label class="form-check-label m-1">
                                        <input type="checkbox" class="form-check-input" name="artnegativo" id="artnegativo" value="1" {{old('artnegativo') == 1 ? 'checked' : ''}}>
                                        Control de negativos
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- LINEA 6 --}}
                        <div class="form-row">
                            <legend class="text-black-50">Datos  varios</legend>
                            @include('partials.articulos.crearf.datos_varios')
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <div class="form-check">
                                    <label class="form-check-label m-1">
                                        <input type="checkbox" class="form-check-input" name="artinactive" id="artinactive" value="1" {{old('artinactive') == 1 ? 'checked' : ''}}>
                                        Desactivar
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- LINEA 7 --}}
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
    <div class="tab-pane fade" id="movimientos-articulos" role="tabpanel" aria-labelledby="movimientos-articulo-tab">

    </div>
  </div>

@include('marcas.marcas_modal')
@include('familias.familias_modal')
@include('familias.subfamilias.subfamilia_modal')
