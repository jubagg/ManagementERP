$token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
$urlnum = $('#numruta').val();
$urlemi = $('#emiruta').val();
$urlpred = $('#preruta').val();

function controlempresa() {
    $("#tablasempresa tr").mouseenter(function() {
        $('#tablasempresa tr').css("background-color", "");
        $(this).css("background-color", '#FFF3E0');
        $("#tablasempresa tr").mouseleave(function() {
            $('#tablasempresa tr').css("background-color", "");
        });
    });
}

$('#tablasempresa ').ready(function() {
    controlempresa();
});

$("#tablasempresa tr").click(function() {
    var arrai = [];
    largo = $("td").length;
    largo = largo + 1;
    for (var i = 1; i < largo; i++) {
        arrai.push($(this).find("td:nth-child(" + i + ")").text());
    }

    $('#empid').val(arrai[0]);
    $('#empnom').val(arrai[1]);
    $('#empcuit').val(arrai[2]);
    $('#empdir').val(arrai[3]);
    $('#emptel').val(arrai[4]);
    $('#empmail').val(arrai[5]);
});

function controlsucursales() {
    $("#tablassucursal tr").mouseenter(function() {
        $('#tablassucursal tr').css("background-color", "");
        $(this).css("background-color", '#FFF3E0');
        $("#tablassucursal tr").mouseleave(function() {
            $('#tablassucursal tr').css("background-color", "");
        });
    });
}

$('#tablassucursal ').ready(function() {
    controlsucursales();
});

$("#tablassucursal tr").click(function() {
    var arrai = [];
    largo = $("td").length;
    largo = largo + 1;
    console.log(largo);
    for (var i = 1; i < largo; i++) {
        arrai.push($(this).find("td:nth-child(" + i + ")").text());
    }

    $('#sucid').val(arrai[0]);
    $('#sucnom').val(arrai[1]);
    $('#sucabr').val(arrai[2]);

});

$("#tablasestaciones tr").click(function() {
    var arrai = [];
    largo = $("td").length;
    largo = largo + 1;
    for (var i = 1; i < largo; i++) {
        arrai.push($(this).find("td:nth-child(" + i + ")").text());
    }
    $('#estid').val(arrai[0]);
    $('#estnom').val(arrai[1]);
    $('#estred').val(arrai[2]);
});


$("#tablasusuarios tr").click(function() {
    var arrai = [];
    largo = $("td").length;
    largo = largo + 1;
    for (var i = 1; i < largo; i++) {
        arrai.push($(this).find("td:nth-child(" + i + ")").text());
    }

    $('#userid').val(arrai[0]);
    $('#user').val(arrai[1]);
    $('#name').val(arrai[2]);
    $('#email').val(arrai[4]);
    if (arrai[3] == 'cliente') {
        $('#role').val(3);
    }
    if (arrai[3] == 'user') {
        $('#role').val(2);
    }
    if (arrai[3] == 'admin') {
        $('#role').val(1);
    } else {
        $('#role').val('');
    }
});



function datosComprobantes(arr) {
    arrai = [];
    $.each(arr, function(key, value) {
        arrai.push({ id: value.comid, comp: value.comdesc });
    })
    return arrai;
};


$(document).ready(function() {
    datosComprobantes(datosTabla);

});

$('#cemid').focus(function() {});

$('#borraremisores').click(function() {
    comprobantes.clearData();
    var datosOr = (datosComprobantes(datosTabla));
    var datos1 = datosOr.slice(0, 20);
    var datos2 = datosOr.slice(21);
    comprobantes.addRow(datos1);
    comprobantes.addRow(datos2);
    $('#action').val('crear');
});

$("#tablaemisores tr").click(function() {
    var arrai = [];
    largo = $("td").length;
    largo = largo + 1;
    for (var i = 1; i < largo; i++) {
        arrai.push($(this).find("td:nth-child(" + i + ")").text());
    }
    $.ajax({
        method: "post",
        url: $urlemi + '/' + arrai[0],
        headers: $token,
        data: {
            id: arrai[0],
        },
        success: function(response) {
            response = JSON.parse(response);
            recumerarNumeracion(arrai[0]);
            $('#action').val('modificar');
            $('#cemid').val(response.cemid);
            $('#cemdes').val(response.cemdes);
            if (response.cemmarca == null) {
                $('#cemmarca').val('Seleccionar');
            } else {
                $('#cemmarca').val(response.cemmarca);
            }
            $('#cemcola').val(response.cemcola);
            $('#cemport').val(response.cemport);
            $('#cembaud').val(response.cebaud);
            $('#cemmonmax').val(response.cemmonmax);
        },
    });
});



function recumerarNumeracion(id) {
    $.ajax({
        method: "POST",
        url: $urlnum + '/' + id,
        headers: $token,
        data: {
            id: id,
        },
        success: function(response) {
            rellenarTablaCentros(response);
        }
    });
};

function rellenarTablaCentros(datos) {
    datos = JSON.parse(datos);

    $.each(datos, function(key, value) {
        if (value.refrep == '0') {
            comprobantes.updateData([{ id: value.tipcom, cop: value.numcop, ultcom: value.ultnum, ultfec: value.ultfech }]);
        } else {
            comprobantes.updateData([{ id: value.tipcom, cop: value.numcop, ultcom: value.ultnum, ultfec: value.ultfech, report: value.refrep }]);
        }
    })
}

$("#est").focusout(function() {
    $select = $("option:selected", this).val();
    console.log($select);
    getPre($select);
});

function getPre(id) {
    $.ajax({
        method: "POST",
        url: $urlpred + '/' + id,
        headers: $token,
        data: {
            id: id,
        },
        success: function(response) {
            json = JSON.parse(response);
            $.each(json, function(key, response) {

                $('#suc').val(response.presuc);
                $('#caja').val(response.precaja);
                $('#deposito').val(response.predeposito);
                $('#venta').val(response.preventa);
                $('#listpre').val(response.prelista);
                $('#pedidos').val(response.prepedidos);
                $('#remitos').val(response.preremitos);
                $('#facta').val(response.prefacta);
                $('#factb').val(response.prefactb);
                $('#ndeba').val(response.prendeba);
                $('#ndebb').val(response.prendebb);
                $('#ncredb').val(response.precredb);
                $('#ncreda').val(response.precreda);
                $('#movstk').val(response.premovstk);
                $('#presu').val(response.prepresu);
                $('#cobranzas').val(response.precobra);
                $('#ordcom').val(response.preordcomp);
                $('#ordvta').val(response.preordvta);

            });
        }
    });
};


var comprobantes = new Tabulator("#comprobantestab", {
    //data:tabledata,           //load row data from array
    layout: "fitColumns", //fit columns to width of table
    placeholder: "",
    selectable: false,
    data: datosComprobantes(datosTabla),
    initialSort: [ //set the initial sort order of the data
        { column: "id", dir: "asc" },
    ],
    columns: [ //define the table columns
        { title: "ID", field: "id", width: 50 },
        { title: "Comprobante", field: "comp" },
        { title: "Copias", field: "cop", editor: "number", width: 120, },
        { title: "Ultimo comp.", field: "ultcom", editor: true, width: 120 },
        { title: "Ultima fech.", field: "ultfec", editor: true, width: 120 },
        { title: "Reporte", field: "report", width: 150, editor: "select", editorParams: { values: valores, } }
    ],
    dataChanged: function(data) {

        $.each(data, function(key, value) {
            if (value.cop === undefined) {
                value.cop = 0;
            }
            if (value.ultcom === undefined) {
                value.ultcom = '0';
            }
            if (value.ultfec === undefined) {
                value.ultfec = '2000-01-01';
            }
            if (value.report === undefined) {
                value.report = '0';
            }
        });
        selectedData = JSON.stringify(data);
        $('#numeraciondatos').val(selectedData);
    },
});