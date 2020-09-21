<div class="form-group">

    <input type="hidden" class="form-control" name="inputName" id="listado" value="{{route('articulos.ajax.listado')}}">
    <input type="hidden" class="form-control" name="inputName" id="busca" value="{{route('articulos.busqueda')}}">
    <input type="hidden" class="form-control" name="inputName" id="modificar" value="{{route('articulos.modificar')}}">
</div>
        <table class="table" id='tablaarticulos'>
            <thead>
                <tr  class="bg-white">
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Familia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articulos as $art)
                <tr value="{{$art->artcod}}" data-href="{{route('articulos.modificar', $art->artcod)}}" class="clickableRow">
                    <td scope="row">{{$art->artcod}}</td>
                    <td>{{$art->artdesc}}</td>
                    <td>{{$art->artfam}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
