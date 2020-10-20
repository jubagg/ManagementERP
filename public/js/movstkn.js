$token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
$url = $('#codartstkroute').val();
cantidad = $('#codcantstk').val();
$idarticulo = null;
$tipomov = null;
$tipocom = null;
$deposito = null;

function selecttipomov() {
    if ($tipomov === null || $("#tipmovstk :selected").val() == 'Seleccionar') {
        //$tipomov = $("#tipmovstk :selected").val();
        $tipomov = 0;
    } else {
        $('#tipmovstk').change(function() {
            $tipomov = $(this).val();
        });
    }
    return $tipomov;
};

function selecttipocomp() {
    if ($tipocom === null || $("#tipcom :selected").val() == 'Seleccionar') {
        $tipocom = $("#tipcom :selected").val();
        //$tipocom = 0;
    } else {
        $('#tipcom').change(function() {
            $tipocom = $(this).val();
        });
    }
    return $tipocom;
}

function selectdepos() {
    if ($deposito === null || $("#deposito :selected").val() == 'Seleccionar') {
        //$tipomov = $("#tipmovstk :selected").val();
        $deposito = 0;
    }
    return $deposito;
}

$('#deposito').change(function() {
    $deposito = $(this).val();
});

$('#tipcom').change(function() {
    $tipocom = $(this).val();
});


//ajax
function buscaarticulo() {
    buscador = $('#codartstk').val();
    if (buscador != null) {
        $.ajax({
            url: $url + '/' + buscador,
            method: 'post',
            headers: $token,
            data: {
                busqueda: $('#codartstk').val(),
            },
            success: function(result) {
                var result = JSON.parse(result);
                if (result === null || result === '' || result.length == 0) {
                    $('#codartstk').val('');
                    $('#alert').children("div").remove();
                    $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">No se ingreso ningún artículo</div></div>');
                } else {
                    $idarticulo = result.artcod;
                    console.log(result);
                    //if(result.coddescalt != null){
                    table.updateOrAddRow(result.artcod, { id: result.artcod, codart: result.coddescalt, descripcion: result.artdesc, unmed: result.tmabr });
                    //}else{
                    table.updateOrAddRow(result.artcod, { id: result.artcod, codart: result.artcod, descripcion: result.artdesc, unmed: result.tmabr });
                    //`}
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

function autocomplete() {
    $result = null;
    var arrai = new Array();
    buscador = $('#codartstk').val();
    //if(buscador != null && buscador.length < 1){
    $.ajax({
        url: $url + '/' + buscador,
        method: 'post',
        headers: $token,
        data: {
            busqueda: buscador,
        },
        success: function($result) {
            $result = JSON.parse($result);
            $.each($result, function(key, value) {
                arrai.push({ label: value.artdesc, value: value.artcod });
            });
            $('#codartstk').autocomplete({
                source: arrai
            });
            $('#alert').children("div").remove();
        },
        error: function($result) {
            console.log($result);
            $('#alert').children("div").remove();
            $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">' + $result + '</div></div>');
        }
    });

};

function validadcantidad() {
    articulo = $('#codartstk').val();
    tipomov = selecttipomov();
    cantidad = $('#codcantstk').val();
    fecha = $('#fecmov').val();
    if (articulo != null) {
        $.ajax({
            url: $url + '/' + articulo + '/' + tipomov + '/' + cantidad + '/' + fecha,
            method: 'post',
            headers: $token,
            data: {
                articulo: articulo,
                tipomov: tipomov,
                cantidad: cantidad,
                fecha: fecha,
            },
            success: function(result) {
                var result = JSON.parse(result);
                if (result.original.error) {
                    $('#alert').children("div").remove();
                    $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">' + result.original.error + '</div></div>');
                    $('#codcantstk').val('');
                } else {
                    $('#alert').children("div").remove();

                    acutalizarCantidad();
                    $validador = selecttipomov();
                    if ($validador != 99) {
                        $('#codartstk').focus();
                        $('#codcantstk').val('');
                        $('#codartstk').val('');
                        acutalizarPrecio();
                        var row = table.getRow($idarticulo);
                        var rowdata = row.getData();
                        $preciounitario = rowdata.precom;
                        $cantidad = rowdata.cant;
                        $preciofinal = $preciounitario * $cantidad;
                        $preciofinal = $preciofinal.toFixed(2);
                        table.updateData([{ id: $idarticulo, prefin: '$ ' + $preciofinal }]);
                        var data = table.getData();
                        selectedData = JSON.stringify(data);
                        $('#tabladatos').val(selectedData);
                    } else {
                        $('#codprecstk').focus();
                    }
                };
            },
            error: function(result) {
                $('#alert').children("div").remove();
                $('#alert').append('<div class=" col-12 justify-content-center text-center d-inline-flex" id="message"><div class="alert alert-danger col-8">No se ingreso ningún artículo</div></div>');
            }
        });
    };
};

/*
validaciones
*/
$('#codartstk').focus(function() {
    if (selecttipomov() == 0) {
        alert('Debe ingresar un tipo de movimiento.');
        $("#tipmovstk").addClass('is-invalid');
        $('#tipmovstk').focus();
    } else {
        $("#tipmovstk").removeClass('is-invalid');
    }
    if (selecttipocomp() == 0) {
        alert('Debe ingresar un tipo de comprobante.');
        $("#tipcom").addClass('is-invalid');
        $('#tipcom').focus();
    } else {
        $("#tipcom").removeClass('is-invalid');
    }
    $val = selectdepos();
    if (selectdepos() == 0) {
        alert('Debe ingresar un deposito.');
        $("#deposito").addClass('is-invalid');
        $('#deposito').focus();
    } else {
        $("#deposito").removeClass('is-invalid');
    }
    if ($('#cememisor').val().length == 0) {
        alert('Debe ingresar un centro emisor.');
        $("#cememisor").addClass('is-invalid');
        $('#cememisor').focus();
    } else {
        $("#cememisor").removeClass('is-invalid');
    }
    if ($('#numcom').val().length == 0) {
        alert('Debe ingresar un numero de comprobante.');
        $("#numcom").addClass('is-invalid');
        $('#numcom').focus();
    } else {
        $("#numcom").removeClass('is-invalid');
    }
    if ($('#fecmov').val().length == 0) {
        alert('Debe ingresar una fecha válida.');
        $("#fecmov").addClass('is-invalid');
        $('#fecmov').focus();
    } else {
        $("#fecmov").removeClass('is-invalid');
    }
});

//filtro por letras o numeros
$('#codartstk').keydown(function(event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key) && $('#codartstk').val().length > 1) {
        autocomplete();
    }
});

//al tabular codigo de articulo
$('#codartstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        buscaarticulo();
    }
});

/*
---CONTROL DE VISTAS
*/
function ocultarVarPro() {
    $('#variableproveedor').hide();
}

function ocultarVarDep() {
    $('#variabledepositos').hide();
}

function mostrarVarPro() {
    $('#variableproveedor').show();
}

function mostrarVarDep() {
    $('#variabledepositos').show();
}

$(document).ready(function() {
    ocultarVarPro();
    ocultarVarDep();
    selecttipocomp();
    selecttipomov();
    selectdepos();
});

$('#tipmovstk').change(function() {
    $tipomov = $(this).val();

    if ($tipomov == 99) {
        mostrarVarPro();
        ocultarVarDep();
        $('#codprecstk').prop('disabled', false);
    } else if ($tipomov == 98) {
        mostrarVarDep();
        ocultarVarPro();
        $('#codprecstk').prop('disabled', true);
    } else {
        ocultarVarPro();
        ocultarVarDep();
        $('#codprecstk').prop('disabled', true);
    }
});

/*
AL TABULAR LA CANTIDAD
*/
$('#codcantstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        validadcantidad();
        /* acutalizarCantidad();
        //$('#codcantstk').val('');
        $('#codprecstk').focus(); */
    }
});
/*
AL TABULAR PRECIO
*/
$('#codprecstk').keydown(function(e) {
    var code = e.keyCode || e.which;
    if (code === 9) {
        e.preventDefault();
        $(this).val($(this).val().replace(',', '.'));
        acutalizarPrecio();
        $('#codprecstk').val('');
        $('#codcantstk').val('');
        $('#codartstk').val('');
        $('#codartstk').focus();
        var row = table.getRow($idarticulo);
        var rowdata = row.getData();
        $preciounitario = rowdata.precom;
        $cantidad = rowdata.cant;
        $preciofinal = $preciounitario * $cantidad;
        $preciofinal = $preciofinal.toFixed(2);
        table.updateData([{ id: $idarticulo, prefin: '$ ' + $preciofinal }]);
        var data = table.getData();
        selectedData = JSON.stringify(data);
        $('#tabladatos').val(selectedData);
    }
});
//actualizar cantidad en la celda de la fila seleccionada, busca por id de articulo
function acutalizarCantidad() {
    table.updateData([{ id: $idarticulo, cant: $('#codcantstk').val() }]);
}

function borrarFilaStk() {
    table.deleteRow($idarticulo);
    $('#codprecstk').val('');
    $('#codcantstk').val('');
    $('#codartstk').val('');
    $('#codartstk').focus();
};

//actualizar precio en la celda de la fila seleccionada, busca por id de articulo
function acutalizarPrecio() {
    $validador = selecttipomov();
    if ($validador != 99) {
        table.updateData([{ id: $idarticulo, precom: 0 }]);
    } else {
        table.updateData([{ id: $idarticulo, precom: $('#codprecstk').val() }]);
    }
}

//CAGAR TABLA
var table = new Tabulator("#example-table", {
    //data:tabledata,           //load row data from array
    layout: "fitColumns", //fit columns to width of table
    placeholder: "Aún no se cargo ningún artículo...",
    selectable: true,
    initialSort: [ //set the initial sort order of the data
        { column: "id", dir: "asc" },
    ],
    columns: [ //define the table columns
        { title: "ID", field: "id", width: 50 },
        { title: "Código articulo", field: "codart", width: 100 },
        { title: "Descripción", field: "descripcion" },
        { title: "UM", field: "unmed", width: 100 },
        { title: "Cantidad", field: "cant", editor: true, width: 140 },
        { title: "Precio compra", field: "precom", editor: true, width: 160 },
        { title: "Precio final", field: "prefin", width: 160 },
    ],
});