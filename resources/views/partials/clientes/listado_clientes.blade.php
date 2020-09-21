<div class="form-group">

    <input type="hidden" class="form-control" name="inputName" id="listado" value="{{route('clientes.listado')}}">
    <input type="hidden" class="form-control" name="inputName" id="busca" value="{{route('clientes.ajax.busqueda')}}">
    <input type="hidden" class="form-control" name="inputName" id="modificar" value="{{route('clientes.modificar')}}">
</div>
        <table class="table" id='tablaclientes'>
            <thead>
                <tr  class="bg-white">
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>C.U.I.T.</th>
                    <th>Télefono</th>
                    <th>Correo E.</th>
                    <th>Ultima modificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente as $c)
                <tr value="{{$c->clicodsis}}" data-href="{{route('clientes.modificar', $c->clicodsis)}}" class="clickableRow">
                    <td scope="row">{{$c->clicodsis}}</td>
                    <td>{{$c->clifantasia}}</td>
                    <td>{{$c->clicuit}}</td>
                    <td>{{$c->clitel}}</td>
                    <td>{{$c->cliemail}}</td>
                    <td>{{$c->climod}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


