<div class="nav flex-column nav-pills" id="m-tablas" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{session('valortab') == 'empresa' ? 'active' : ''}}" id="tablasemp-tab" data-toggle="pill" href="#tablasemp" role="tab" aria-controls="tablasemp" aria-selected="true">
        <i class="fas fa-plus mx-1"></i>
        Empresa
    </a>
    <a class="nav-link {{session('valortab') == 'sucursales' ? 'active' : ''}}" id="sucursales-tab" data-toggle="pill" href="#sucursales" role="tab" aria-controls="sucursales" aria-selected="false" >
        <i class="fas fa-project-diagram mx-1"></i>
        Sucursales
    </a>
    <a class="nav-link {{session('valortab') == 'usuarios' ? 'active' : ''}}" id="usuarios-tab" data-toggle="pill" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false" >
        <i class="fas fa-users mx-1"></i>
        Usuarios
    </a>
    <a class="nav-link" id="movimientos-stock-tab" data-toggle="pill" href="#movimientos-stock" role="tab" aria-controls="movimientos-stock" aria-selected="false" >
        <i class="fas fa-people-carry mx-1"></i>
        Terminales y estaciones
    </a>
    <a class="nav-link" id="movimientos-stock-tab" data-toggle="pill" href="#movimientos-stock" role="tab" aria-controls="movimientos-stock" aria-selected="false" >
        <i class="fas fa-people-carry mx-1"></i>
        Centros emisores
    </a>
</div>
