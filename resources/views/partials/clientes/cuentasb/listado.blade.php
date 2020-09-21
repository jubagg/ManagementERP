<table class="table" id="listadobancos">
    <thead>
        <tr  class="bg-white">
            <th>Banco</th>
            <th>Sucursal</th>
            <th>CBU</th>
            <th>Tipo cuenta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listadob as $lb)
        <tr value="{{$lb->cbid}}">
            @foreach($lb->bancos as $bancos)
            <td scope="row">{{$bancos->bdes}}</td>
            @endforeach
            <td>{{$lb->cbsuc}}</td>
            <td>{{$lb->cbcbu}}</td>
            <td>{{$lb->cbtipcue}}</td>
            <td><button name="cbeliminar" id="cbeliminar" class="btn btn-danger" onclick="ajaxBorrarBancos({{$lb->cbid}})"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>
