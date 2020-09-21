    //mostrar agregar cuenta bancaria
    $(document).ready(function() {
        $('#agregarcb').click(function() {
            $('#listadocbtab').hide();
            $('#formcb').fadeToggle("slow");
        });
    });
    //sacar notificacion de actividad db
    $(document).ready(function() {
        $('#formcb').hide();
        $(document).ready(function() {
            $('a').click(function() {
                $('#notificacion').remove();
            });
        });
    });
    //mostrar listado al cargar pagina
    $(document).ready(function() {
        $('#listadocb').show();
    });
    //mostrar listado
    $(document).ready(function() {
        $('#listadocb').click(function() {
            $('#formcb').hide();
            $('#listadocbtab').fadeToggle("slow");
        });
    });
    //ajax para crear una nueva cuenta bancaria
    $(document).ready(function() {
        $('#formbancos').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $('#bancosupdate').val(),
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    cbcliente: $('#cbcliente').val(),
                    cbcbu: $('#cbcbu').val(),
                    cbbanco: $('#cbbanco').val(),
                    cbsucursal: $('#cbsucursal').val(),
                    tipcue: $('input:radio[name=tipcue]:checked').val()
                },
                success: function(result) {
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
                    $('#formBancos')[0].reset();
                    $divbanco = $('#divbanco');
                    $divtipcue = $('#divtipcue');
                    $divcbu = $("#divcbu");
                    $($divcbu).children('#errors').remove();
                    $($divtipcue).children('#errors').remove();
                    $($divbanco).children('#errors').remove();
                    //recargar listado
                    ajaxListadoBancos();
                },
                error: function(result) {
                    if (result.status === 422) {
                        var errores = result.responseJSON.errors;
                        $banco = errores.cbbanco;
                        $cbu = errores.cbcbu;
                        $tipcue = errores.tipcue;
                        $divbanco = $('#divbanco');
                        $divtipcue = $('#divtipcue');
                        $divcbu = $("#divcbu");
                        $($divcbu).children('#errors').remove();
                        $($divtipcue).children('#errors').remove();
                        $($divbanco).children('#errors').remove();
                        if ($cbu) {
                            $divcbu.append('<p class="text-danger" id="errors"><small>' + $cbu + '</small></p>')
                        };
                        if ($tipcue) {
                            $divtipcue.append('<p class="text-danger" id="errors"><small>' + $tipcue + '</small></p>')
                        };
                        if ($banco) {
                            $divbanco.append('<p class="text-danger" id="errors"><small>' + $banco + '</small></p>')
                        };
                    };
                }
            });
        });
    });

    function tipoCuenta(cuenta) {
        if (cuenta == 'cap') {
            return "Caja de ahorro en pesos"
        } else if (cuenta == 'ccp') {
            return "Cuenta corriente en pesos"
        } else if (cuenta == 'cad') {
            return "Caja de ahora en dólares"
        } else if (cuenta == 'ccd') {
            return "Cuenta corriente en dólares"
        };
    };

    function vaciarNull(valor) {
        if (valor === null) {
            return '';
        } else {
            return valor;
        };
    }

    function ajaxListadoBancos() {
        $.ajax({
            url: $('#bancoslistado').val(),
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            success: function(result) {
                var $table = $('#listadobancos');
                $table.empty();
                $table.append('<thead>' +
                    '<tr  class="bg-white">' +
                    '<th>Banco</th>' +
                    '<th>Sucursal</th>' +
                    '<th>CBU</th>' +
                    '<th>Tipo cuenta</th>' +
                    '<th>Acciones</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>');
                $.each(result, function(key, value) {
                    $table.append('<tr value="' + value.cbid + '">' +
                        '<td scope="row">' + value.bdes + '</td>' +
                        '<td>' + vaciarNull(value.cbsuc) + '</td>' +
                        '<td>' + value.cbcbu + '</td>' +
                        '<td>' + tipoCuenta(value.cbtipcue) + '</td>' +
                        '<td><button name="cbeliminar" id="cbeliminar" class="btn btn-danger" onclick="ajaxBorrarBancos(' + value.cbid + ')"><i class="fas fa-trash-alt"></i></button></td>' +
                        '</tr>');
                });
                $table.append('</tbody>' +
                    '</table>');
            }
        });
    };

    function ajaxBorrarBancos($id) {
        $.ajax({
            url: $('#bancoseliminar').val() + '/' + $id,
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            success: function(result) {
                $.each(result, function(key, value) {
                    var $div = $('#contenido');
                    if (value !== null) {
                        if (key == 'message') {
                            $('div#contenido').children('#notificacion').remove();
                            $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-warning col-8"><p>' + value + '</p></div></div>');
                        } else {
                            $('div#contenido').children('#notificacion').remove();
                            $div.prepend('<div class=" col-12 justify-content-center text-center d-inline-flex" id="notificacion"><div class="alert alert-danger col-8"><p>' + value + '</p></div></div>');
                        };
                    };
                });
                ajaxListadoBancos();
            }
        });
    };