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
    <a class="nav-link {{session('valortab') == 'terminales' ? 'active' : ''}}" id="terminales-tab" data-toggle="pill" href="#terminales" role="tab" aria-controls="terminales" aria-selected="false" >
        <i class="fas fa-desktop mx-1"></i>
        Terminales y estaciones
    </a>
    <a class="nav-link {{session('valortab') == 'emisores' ? 'active' : ''}}" id="emisores-tab" data-toggle="pill" href="#emisores" role="tab" aria-controls="emisores" aria-selected="false" >
        <i class="fas fa-print mx-1"></i>
        Centros emisores
    </a>
    <a class="nav-link {{session('valortab') == 'predet' ? 'active' : ''}}" id="predet-tab" data-toggle="pill" href="#predet" role="tab" aria-controls="predet" aria-selected="false" >
        <i class="fas fa-check-double mx-1"></i>
        Predeterminados
    </a>
</div>
