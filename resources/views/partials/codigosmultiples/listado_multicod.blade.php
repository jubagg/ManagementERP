@if(isset($listado['message']))
<div class=" col-12 justify-content-center text-center d-inline-flex mt-3" id="message">
    <div class="alert alert-info col-8">
        {{ $listado['message'] }}
    </div>
</div>
@else
    <table class="table table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código de barra</th>
                <th>Descripción alternativa</th>
                <th>Cantidad bulto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listado as $l)
            <tr>
                <td scope="row">{{$l->codid}}</td>
                <td>{{$l->codcod}}</td>
                <td>{{$l->coddescalt}}</td>
                <td>{{$l->codcant}}</td>
                <td><a name="codeliminar" id="codeliminar" class="btn btn-danger btn-sm" href="{{route('articulos.codigosmulti.borrar',['articuloid' =>$articulo->artcod,'codigoid'=>$l->codid])}}" ><i class="fas fa-trash-alt fa-sm"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
