$(document).ready(function() {
    $('#guardarBanco').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: $('#bancoscrear').val(),
            method: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                bancos: $('#bancos').val(),
                babr: $('#babr').val(),
            },
            success: function(result) {
                $('#modalBanco').modal('hide');
                $('#formBanco')[0].reset();
                $.ajax({
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: $('#bancoslistadom').val(),
                    dataType: 'json',
                    success: function(dataResult) {
                        var $select = $('#cbbanco');
                        $('#cbbanco').empty();
                        //alert(options);
                        $select.append('<option value="seleccionar">Seleccionar</option>');
                        $.each(dataResult, function(key, value) {
                            $select.append('<option value="' + value.bid + '">' + value.bdes + '</option>');
                        });
                    }
                });
                alert("Exito al grabar el nuevo banco");
                $divban = $('#divbancos');
                $divbabr = $('#divbabr');
                $($divban).children('#errors').remove();
                $($divbabr).children('#errors').remove();
            },
            error: function(result) {

                var errors = result.responseJSON.errors;
                $bancos = errors.bancos;
                $babr = errors.babr;
                $divban = $('#divbancos');
                $divbabr = $('#divbabr');
                $('#formBancos')[0].reset();

                $($divban).children('#errors').remove();
                $($divbabr).children('#errors').remove();

                if ($bancos) {
                    $divban.append('<p class="text-danger" id="errors"><small>' + $bancos + '</small></p>')
                };
                if ($babr) {
                    $divbabr.append('<p class="text-danger" id="errors"><small>' + $babr + '</small></p>')
                };
            }
        });
    });
});