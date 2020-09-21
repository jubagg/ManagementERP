function modificar() {
    $('*[data-href]').click(function() {
        window.location = $(this).data('href');
        return false;
    });
}

$(document).ready(function() {
    controltabla();
});

function controltabla() {
    $("#tablaclientes tr").mouseenter(function() {
        $('#tablaclientes tr').css("background-color", "");
        $(this).css("background-color", '#FFF3E0');
        $("#tablaclientes tr").mouseleave(function() {
            $('#tablaclientes tr').css("background-color", "");
        });
    });
}

$('#buscadorcliente').keyup(function(e) {
    e.preventDefault();
    ajaxclientes();
});

$('#tablaclientes tr').ready(function() {
    controltabla();
    modificar();
});

function ajaxclientes() {
    var buscador = $('#buscadorcliente').val();
    if (buscador.length != 0) {
        $.ajax({
            url: $('#busca').val() + '/' + buscador,
            method: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                busqueda: $('#buscadorcliente').val(),
            },
            success: function(result) {

                var $tabla = $('#tablaclientes');
                var url = $('#modificar').val();
                $('#tablaclientes').empty();
                //alert(options);
                $tabla.append('<thead>' +
                    '<tr  class="bg-white">' +
                    '<th>Código</th>' +
                    '<th>Nombre</th>' +
                    '<th>C.U.I.T.</th>' +
                    '<th>Télefono</th>' +
                    '<th>Correo E.</th>' +
                    '<th>Ultima modificación</th>' +
                    '</tr>   ' +
                    '</thead>' +
                    '<tbody>');
                $.each(JSON.parse(result), function(key, value) {

                    $tabla.append('<tr value="' + key.clicodsis + '" data-href="' + url + '/' + value.clicodsis + '" class="clickableRow">' +
                        '<td scope="row">' + value.clicodsis + '</td>' +
                        '<td>' + value.clifantasia + '</td>' +
                        '<td>' + value.clicuit + '</td>' +
                        '<td>' + value.clitel + '</td>' +
                        '<td>' + value.cliemail + '</td>' +
                        '<td>' + value.climod + '</td>' +
                        '</tr>');
                });
                $tabla.append('</tbody>' +
                    '</table>');

                controltabla();
                modificar();
            }
        });
    } else {
        $.ajax({
            url: $('#listado').val(),
            method: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                busqueda: $('#buscadorcliente').val(),
            },
            success: function(result) {

                var $tabla = $('#tablaclientes');
                var url = $('#modificar').val();
                $('#tablaclientes').empty();
                //alert(options);
                $tabla.append('<thead>' +
                    '<tr  class="bg-white">' +
                    '<th>Código</th>' +
                    '<th>Nombre</th>' +
                    '<th>C.U.I.T.</th>' +
                    '<th>Télefono</th>' +
                    '<th>Correo E.</th>' +
                    '<th>Ultima modificación</th>' +
                    '</tr>   ' +
                    '</thead>' +
                    '<tbody>');
                $.each(JSON.parse(result), function(key, value) {
                    $tabla.append('<tr value="' + value.clicodsis + '" data-href="' + url + '/' + value.clicodsis + '" class="clickableRow">' +
                        '<td scope="row">' + value.clicodsis + '</td>' +
                        '<td>' + value.clifantasia + '</td>' +
                        '<td>' + value.clicuit + '</td>' +
                        '<td>' + value.clitel + '</td>' +
                        '<td>' + value.cliemail + '</td>' +
                        '<td>' + value.climod + '</td>' +
                        '</tr>');
                });
                $tabla.append('</tbody>' +
                    '</table>');

                controltabla();
                modificar();
            }
        });
    }
}