
{{-- FORMULARIO --}}
<div class="card-body" id="formcb">
    <input type="hidden" class="form-control" name="bancosupdate" id="bancosupdate" value="{{route('cb.update')}}">
    <input type="hidden" class="form-control" name="bancoslistado" id="bancoslistado" value="{{route('cb.listado')}}">
    <input type="hidden" class="form-control" name="bancoseliminar" id="bancoseliminar" value="{{route('cb.eliminar')}}">
<form {{-- action="{{route('cb.update')}}" --}} method="post" id="formBancos">
    {{-- {{csrf_field()}} --}}
    @csrf
    <input type="hidden" name="action" value="crear">
    {{-- cliente --}}
    <input type="hidden" class="form-control" name="cbcliente" id="cbcliente" value="{{$cliente->clicuit}}">
        {{-- CARD --}}
        <div class="row">
            <div class="col-12 text-right">
                <h4 class="text-black-50">Cuentas bancarias de clientes
                    <i class="fas fa-university"></i>
                </h4>
            </div>
        </div>
        <hr>
        <div class="col-12">
            {{-- LINEA 1 --}}
            <div class="form-row">
                <legend class="text-black-50">Agregar nueva cuenta</legend>
                @include('partials.clientes.cuentasb.linea1')
            </div>
        </div>
    </div>
</form>
