$listado = $('#rutamarcalistado').val();
$crear = $('#rutamarcacrear').val();
$selectmarcas = $('#artmar');
$botonform = $('#guardarMarcaModal');
$formulariomarcas = $('#formularioMarcasModal');
$token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
$listadofam = $('#rutafamilialistado').val();
$crearfam = $('#rutafamiliacrear').val();
$selectfamilia = $('#artfam');
$botonformfam = $('#guardarFamiliaModal');
$formulariofamilias = $('#formularioFamiliasModal');
$listadosubfam = $('#rutasubfamilialistado').val();
$crearsubfam = $('#rutasubfamiliacrear').val();
$selectsubfamilia = $('#artsubfam');
$botonformsubfam = $('#guardarSubfamiliaModal');
$formulariosubfamilias = $('#formularioSubfamiliasModal');
//$token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
//$token = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };


function limpiarFormulario(formulario) {
    formulario[0].reset();
};

function datosMarcas() {
    $id = $('#artidmarca').val();
    $marca = $('#artmarca').val();
    $abrmarca = $('#abrmarca').val();
    $datos = {
        idmarca: $id,
        marca: $marca,
        abrmarca: $abrmarca
    };
    return $datos;
};

$familia2 = null;

function selectdevolucion() {
    $('#artfam2').change(function() {
        $familia2 = $(this).val();
    });
    return $familia2;
};


$('#artfam').change(function() {
    $familia = $(this).val();
    $.ajax({
        url: $('#rutasubfamilialistado').val() + '/' + $familia,
        method: 'post',
        headers: $token,
        dataType: 'json',
        success: function(result) {
            campo = $('#artsubfam');
            campo.empty();
            campo.append('<option value="seleccionar">Seleccionar</option>');
            $.each(result, function(key, value) {
                campo.append('<option value="' + value.sfid + '">' + value.sfdesc + '</option>');
            });
        }
    })
});


$(document).ready(function() {
    selectdevolucion();
});

function datossubfamilia() {
    $id = $('#artidsubfamilia').val();
    $subfamilia = $('#artsubfamilia').val();
    $abrsubfamilia = $('#abrsubfamilia').val();
    $familia = selectdevolucion();
    $datos = {
        id: $id,
        subfamilia: $subfamilia,
        abrsubfamilia: $abrsubfamilia,
        familia: $familia
    };
    return $datos;
};

function datosfamilia() {
    $id = $('#artidfamilia').val();
    $familia = $('#artfamilia').val();
    $abrfamilia = $('#abrfamilia').val();
    $datos = {
        id: $id,
        familia: $familia,
        abrfamilia: $abrfamilia
    };
    return $datos;
};

function ajax(formulario, url, data, token, campo, urlselect) {
    $.ajax({
        url: url,
        method: 'post',
        headers: token,
        data: data,
        success: function(result) {
            $('#modalArtMarca').modal('hide');
            $.each(result, function(key, value) {
                var $div = $('#contenido');
                if (value !== null) {
                    if (key == 'message') {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-success col-8"><p>' + value + '</p></div></div>');
                    } else {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-danger col-8"><p>' + value + '</p></div></div>');
                    };
                };
            })
            campo.empty();
            limpiarFormulario($formulariomarcas);
            //alert(options);
            $.ajax({
                url: urlselect,
                type: 'POST',
                headers: token,
                dataType: 'json',
                success: function(result) {
                    campo.append('<option value="seleccionar">Seleccionar</option>');
                    $.each(result, function(key, value) {
                        campo.append('<option value="' + value.mid + '">' + value.mdesc + '</option>');
                    });
                }
            });
        },
        error: function(resultmarcas) {
            $divid = $('#dividartmarca');
            $divmarca = $('#divartmarca');
            $divabr = $('#divabrmarca');
            $($divid).children('#errorsm').remove();
            $($divmarca).children('#errorsm').remove();
            $($divabr).children('#errorsm').remove();
            if (resultmarcas.status === 422) {
                var errors = resultmarcas.responseJSON.errors;
                $idmarca = errors.idmarca;
                $marca = errors.marca;
                $mabr = errors.abrmarca;
                if ($idmarca) {
                    $divid.append('<p class="text-danger" id="errorsm"><small>' + $idmarca + '</small></p>')
                };
                if ($marca) {
                    $divmarca.append('<p class="text-danger" id="errorsm"><small>' + $marca + '</small></p>')
                };
                if ($mabr) {
                    $divabr.append('<p class="text-danger" id="errorsm"><small>' + $mabr + '</small></p>')
                };
            };
        }
    });
};

function ajaxfamilia(formulario, url, data, token, campo, urlselect) {
    $.ajax({
        url: url,
        method: 'post',
        headers: token,
        data: data,
        success: function(result) {
            $('#modalArtFamilia').modal('hide');
            $.each(result, function(key, value) {
                var $div = $('#contenido');
                if (value !== null) {
                    if (key == 'message') {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-success col-8"><p>' + value + '</p></div></div>');
                    } else {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-danger col-8"><p>' + value + '</p></div></div>');
                    };
                };
            })
            campo.empty();
            limpiarFormulario($formulariofamilias);
            //alert(options);
            $.ajax({
                url: urlselect,
                type: 'POST',
                headers: token,
                dataType: 'json',
                success: function(result) {
                    campo.append('<option value="seleccionar">Seleccionar</option>');
                    $.each(result, function(key, value) {
                        campo.append('<option value="' + value.afid + '">' + value.afdesc + '</option>');
                    });
                    $('#artfam2').append('<option value="seleccionar">Seleccionar</option>');
                    $.each(result, function(key, value) {
                        $('#artfam2').append('<option value="' + value.afid + '">' + value.afdesc + '</option>');
                    });
                }
            });
        },
        error: function(result) {
            if (result.status === 422) {
                var errors = result.responseJSON.errors;
                $idfamilia = errors.id;
                $familia = errors.familia;
                $fabr = errors.abrfamilia;
                $dividfam = $('#dividartfamilia');
                $divfamilia = $('#divartfamilia');
                $divabrfam = $('#divabrfamilia');
                $($dividfam).children('#errors').remove();
                $($divfamilia).children('#errors').remove();
                $($divabrfam).children('#errors').remove();
                if ($idfamilia) {
                    $dividfam.append('<p class="text-danger" id="errors"><small>' + $idfamilia + '</small></p>')
                };
                if ($familia) {
                    $divfamilia.append('<p class="text-danger" id="errors"><small>' + $familia + '</small></p>')
                };
                if ($fabr) {
                    $divabrfam.append('<p class="text-danger" id="errors"><small>' + $fabr + '</small></p>')
                };
            };
        }
    });
};

function ajaxsubfamilia(formulario, url, data, token, campo, urlselect) {
    $.ajax({
        url: url,
        method: 'post',
        headers: token,
        data: data,
        success: function(result) {
            $('#modalArtSubfamilia').modal('hide');
            $.each(result, function(key, value) {
                var $div = $('#contenido');
                if (value !== null) {
                    if (key == 'message') {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-success col-8"><p>' + value + '</p></div></div>');
                    } else {
                        $('div#contenido').children('#notificacion').remove();
                        $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-danger col-8"><p>' + value + '</p></div></div>');
                    };
                };
            })
            campo.empty();
            limpiarFormulario($formulariosubfamilias);
            //alert(options);
            $.ajax({
                url: urlselect,
                type: 'POST',
                headers: token,
                dataType: 'json',
                success: function(result) {
                    campo.append('<option value="seleccionar">Seleccionar</option>');
                    $.each(result, function(key, value) {
                        campo.append('<option value="' + value.sfid + '">' + value.sfdesc + '</option>');
                    });
                }
            });
        },
        error: function(result) {
            if (result.status === 422) {
                var errors = result.responseJSON.errors;
                $idsubfamilia = errors.id;
                $subfamilia = errors.subfamilia;
                $fsubabr = errors.abrsubfamilia;
                $dividsubfam = $('#dividartsubfamilia');
                $divsubfamilia = $('#divartsubfamilia');
                $divabrsubfam = $('#divabrsubfamilia');
                $($dividsubfam).children('#errors').remove();
                $($divsubfamilia).children('#errors').remove();
                $($divabrsubfam).children('#errors').remove();
                if ($idsubfamilia) {
                    $dividsubfam.append('<p class="text-danger" id="errors"><small>' + $idsubfamilia + '</small></p>')
                };
                if ($subfamilia) {
                    $divsubfamilia.append('<p class="text-danger" id="errors"><small>' + $subfamilia + '</small></p>')
                };
                if ($fsubabr) {
                    $divabrsubfam.append('<p class="text-danger" id="errors"><small>' + $fsubabr + '</small></p>')
                };
            };
        }
    });
};

$('#guardarSubfamiliaModal').click(function(e) {
    e.preventDefault();
    ajaxsubfamilia($botonformsubfam, $crearsubfam, datossubfamilia(), $token, $selectsubfamilia, $listadosubfam);
    $('a').click(function() {
        $('#notificacion').remove();
    });
});

$('#guardarFamiliaModal').click(function(e) {
    e.preventDefault();
    ajaxfamilia($botonformfam, $crearfam, datosfamilia(), $token, $selectfamilia, $listadofam);
    $('a,button').click(function() {
        $('#notificacion').remove();
    });
});

$('#guardarMarcaModal').click(function(e) {
    e.preventDefault();
    ajax($botonform, $crear, datosMarcas(), $token, $selectmarcas, $listado);
    $('a').click(function() {
        $('#notificacion').remove();
    });
});

$('a,button').click(function() {
    $('#message').remove();
});

function modificar() {
    $('*[data-href]').click(function() {
        window.location = $(this).data('href');
        return false;
    });
}

function controltablaart() {
    $("#tablaarticulos tr").mouseenter(function() {
        $('#tablaarticulos tr').css("background-color", "");
        $(this).css("background-color", '#FFF3E0');
        $("#tablaarticulos tr").mouseleave(function() {
            $('#tablaarticulos tr').css("background-color", "");
        });
    });
}

$(document).ready(function() {
    ajaxarticulos();
});

$('#tablaarticulos ').ready(function() {
    controltablaart();
    modificar();
});

function ajaxarticulos() {
    $('#buscador').keyup(function(e) {
        e.preventDefault();
        var buscador = $('#buscador').val();
        if (buscador.length != 0) {
            $.ajax({
                url: $('#busca').val() + '/' + buscador,
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    busqueda: $('#buscador').val(),
                },
                success: function(result) {

                    var $tabla = $('#tablaarticulos');
                    var url = $('#modificar').val();
                    $('#tablaarticulos ').empty();
                    //alert(options);
                    $tabla.append('<thead>' +
                        '<tr  class="bg-white">' +
                        '<th>Código</th>' +
                        '<th>Descripción</th>' +
                        '<th>Familia</th>' +
                        '</tr>   ' +
                        '</thead>' +
                        '<tbody>');
                    $.each(JSON.parse(result), function(key, value) {

                        $tabla.append('<tr value="' + key.artcod + '" data-href="' + url + '/' + value.artcod + '" class="clickableRow">' +
                            '<td scope="row">' + value.artcod + '</td>' +
                            '<td>' + value.artdesc + '</td>' +
                            '<td>' + value.artfam + '</td>' +
                            '</tr>');
                    });
                    $tabla.append('</tbody>' +
                        '</table>');

                    controltablaart();
                    modificar();
                }
            });
        } else {
            $.ajax({
                url: $('#listado').val(),
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    busqueda: $('#buscador').val(),
                },
                success: function(result) {

                    var $tabla = $('#tablaarticulos');
                    var url = $('#modificar').val();
                    $('#tablaarticulos').empty();
                    //alert(options);
                    $tabla.append('<thead>' +
                        '<tr  class="bg-white">' +
                        '<th>Código</th>' +
                        '<th>Descripción</th>' +
                        '<th>Familia</th>' +
                        '</tr>   ' +
                        '</thead>' +
                        '<tbody>');
                    $.each(JSON.parse(result), function(key, value) {
                        $tabla.append('<tr value="' + key.artcod + '" data-href="' + url + '/' + value.artcod + '" class="clickableRow">' +
                            '<td scope="row">' + value.artcod + '</td>' +
                            '<td>' + value.artdesc + '</td>' +
                            '<td>' + value.artfam + '</td>' +
                            '</tr>');
                    });
                    $tabla.append('</tbody>' +
                        '</table>');

                    controltablaart();
                    modificar();
                }
            });
        }
    });
}