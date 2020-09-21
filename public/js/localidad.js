    $(document).ready(function() {
        $('#guardarLocalidad').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "http://localhost/management/public/localidad/ajax/guardar",
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    localidad: $('#localidad').val(),
                    abr: $('#abr').val(),
                },
                success: function(result) {
                    $('#modalLocalidad').modal('hide');
                    $('#formLocalidad')[0].reset();
                    $.ajax({
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: "http://localhost/management/public/localidad/ajax/listado",
                        dataType: 'json',
                        success: function(dataResult) {
                            var $select = $('#loc');
                            $('#loc').empty();
                            //alert(options);
                            $select.append('<option value="seleccionar">Seleccionar</option>');
                            $.each(dataResult, function(key, value) {
                                $select.append('<option value="' + value.lid + '">' + value.ldesc + '</option>');
                            });
                        }
                    });
                    alert("Exito al grabar la nueva localidad");
                },
                error: function(result) {
                    var errors = result.responseJSON.errors;
                    $eloc = errors.localidad;
                    $eabr = errors.abr;
                    var $loc = $('#divlocalidad');
                    var $abr = $('#divabr');
                    $('#formLocalidad')[0].reset();
                    $('p').empty();
                    if ($eloc) {
                        $loc.append('<p class="text-danger">' + $eloc + '</p>');
                    };
                    if ($eabr) {
                        $abr.append('<p class="text-danger" id="errors">' + $eabr + '</p>');
                    };
                }
            });
        });
    });
