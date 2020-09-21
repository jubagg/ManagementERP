<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$titulo}}</title>

       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- Bootstrap CSS -->
        <link href="{{asset('tabulator-master/dist/css/tabulator.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/table.css')}}">
        <link href="{{ asset('js/handsontable/dist/handsontable.full.min.css')}}" rel="stylesheet" media="screen">
        <script src="{{ asset('js/handsontable/dist/handsontable.full.min.js')}}" ></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   </head>

   <body>
<div class="container-fluid">
         <nav class="navbar navbar-expand  sticky-top  navbar-light bg-light row">
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="nav navbar-nav">
                   @foreach ($menus as $key => $item)
                       @if ($item['parent'] != 0)
                           @break
                       @endif
                       @include('partials.menu-item', ['item' => $item])
                   @endforeach
               </ul>
           </div>
   </nav>
        <div class="row py-2" style= >
            @section('header')
            @show
        </div>
            <div class="container-fluid">
                <div class="row">
                    @if(!empty($menu))
                    <div class= " col-2 d-none d-inline-block">
                        @section('lateral')
                        @show
                    </div>
                    <div class="py-2 col-10" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @else
                    <div class="py-2 col-12" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
           <script src="https://kit.fontawesome.com/3211b460a4.js" crossorigin="anonymous" async="async" type="text/javascript"></script>
           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
           <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           <script src="{{ asset('js/localidad.js') }}" async="async" type="text/javascript"></script>
           <script src="{{ asset('js/listcli.js') }}" async="async" type="text/javascript"></script>
           <script src="{{ asset('js/bancos.js') }}" async="async" type="text/javascript"></script>
           <script src="{{ asset('js/cuentasbancarias.js') }}" async="async" type="text/javascript"></script>
           <script src="{{ asset('js/articulos.js')}}" async="async" type="text/javascript"></script>
           <script type="text/javascript" src="{{asset('tabulator-master/dist/js/tabulator.min.js')}}"></script>


     </body>
   </html>

   <script>
        $token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
        $url = $('#codartstkroute').val();
        cantidad = $('#codcantstk').val();
        $idarticulo = null;

        function buscaarticulo(){
            buscador = $('#codartstk').val();
            if(buscador != null){
                $.ajax({
                    url: $url + '/' + buscador,
                    method: 'post',
                    headers: $token,
                    data: {
                        busqueda: $('#codartstk').val(),
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        if(result === null){
                            $('#alert').children("div").remove();
                            $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">No se ingreso ningún artículo</div></div>');
                        }else{
                            $idarticulo = result.artcod;
                            table.updateOrAddRow(result.artcod, {id:result.artcod, codart:result.artcod, descripcion:result.artdesc, unmed:result.tmabr});
                            $('#alert').children("div").remove();
                            $('#codcantstk').focus();
                        };
                    },
                    error: function(result) {
                        $('#alert').children("div").remove();
                        $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">No se ingreso ningún artículo</div></div>');
                    }
                });
            };
        };


$('#codartstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        buscaarticulo();
        validator($idarticulo);
    }
});

function validator(id){
    if(id != null){
            $('#codartstk').val('');
        }else{
            $('#codartstk').val('');
        }
};

function ocultarVarPro(){
    $('#variableproveedor').hide();
}

function ocultarVarDep(){
    $('#variabledepositos').hide();
}

function mostrarVarPro(){
    $('#variableproveedor').show();
}

function mostrarVarDep(){
    $('#variabledepositos').show();
}

$(document).ready(function(){
    ocultarVarPro();
    ocultarVarDep();
});


    $('#tipmovstk').change(function() {
        $tipomov = $(this).val();

        if($tipomov == 99){
            mostrarVarPro();
            ocultarVarDep();
        }else if($tipomov == 98){
            mostrarVarDep();
            ocultarVarPro();
        }else{
            ocultarVarPro();
            ocultarVarDep();
        }
    });


$('#codcantstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        acutalizarCantidad();
        $('#codcantstk').val('');
        $('#codprecstk').focus();
    }
});

$('#codprecstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        $(this).val($(this).val().replace(',', '.'));
        acutalizarPrecio();
        $('#codprecstk').val('');
        $('#codartstk').focus();
        var row = table.getRow($idarticulo);
        var rowdata = row.getData();
        $preciounitario = rowdata.precom;
        $cantidad = rowdata.cant;
        $preciofinal = $preciounitario * $cantidad;
        $preciofinal = $preciofinal.toFixed(2);
        table.updateData([{ id:$idarticulo, prefin: '$ ' + $preciofinal}]);
        var data = table.getData();
        selectedData = JSON.stringify(data);
        console.log(selectedData);
        alert(selectedData);
        $('#tabladatos').val(selectedData);
    }
});
//actualizar cantidad en la celda de la fila seleccionada, busca por id de articulo
function acutalizarCantidad(){
    table.updateData([{ id:$idarticulo, cant: $('#codcantstk').val()}]);
}

//actualizar precio en la celda de la fila seleccionada, busca por id de articulo
function acutalizarPrecio(){
    table.updateData([{ id:$idarticulo, precom: $('#codprecstk').val()}]);
}



//CAGAR TABLA
var table = new Tabulator("#example-table", {
    //data:tabledata,           //load row data from array
    layout:"fitColumns",      //fit columns to width of table
    placeholder: "Aún no se cargo ningún artículo...",
    selectable:true,
    initialSort:[             //set the initial sort order of the data
        {column:"id", dir:"asc"},
    ],
    columns:[                 //define the table columns
        {title:"ID", field:"id", width:50},
        {title:"Código articulo", field:"codart", width:100},
        {title:"Descripción", field:"descripcion"},
        {title:"UM", field:"unmed", width:100},
        {title:"Cantidad", field:"cant", editor:true, width:140},
        {title:"Precio compra", field:"precom", editor:true,width:160},
        {title:"Precio final", field:"prefin", width:160},
    ],
});

</script>
