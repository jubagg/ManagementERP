<div class="container-fluid">
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-2">
            <a class="btn btn-info mt-3" href="{{route('reportes', [$cliente->clicodsis, "clientedetalle"])}}" target="_blank">
                <i class="fas fa-print fa-fw" aria-hidden="true"></i>
                <span class="d-none d-inline-block">Imprimir</span>
            </a>
        </div>
        <div class="col-4 text-right">
            <h1 class=" h4 d-none d-inline-block">
                Modificar cliente
                <br>
                <small class="text-info">{{$cliente->clifantasia}}</small>
            </h1>
        </div>
        <div class="col-1 text-center">
            <div class="d-none d-inline-block">
                <i class="fas fa-user-edit fa-3x"></i>
            </div>
        </div>
    </div>
</div>
