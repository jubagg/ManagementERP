$('#prsuc').change(function() {
    $.ajax({
        method: "post",
        headers: $token,
        url: urlprlista + '/' + $(this).val(),
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            response = JSON.parse(response);
            $('#prlp').empty();
            $('#prlp').append($('<option/>').text('Seleccionar'));
            $.each(response, function(key, value) {
                $('#prlp').append($('<option/>').attr({ 'value': value.lpid }).text(value.lpdesc));
            });

        },
        error: function(response) {
            console.log(error);
        }
    });
});

$('#prarticulo').change(function() {
    $.ajax({
        method: "post",
        headers: $token,
        url: urlprart + '/' + $(this).val() + '/precios',
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            console.log(response);
            /* $('#prlp').empty();
            $('#prlp').append($('<option/>').text('Seleccionar'));
            $.each(response, function(key, value) {
                $('#prlp').append($('<option/>').attr({ 'value': value.lpid }).text(value.lpdesc));
            });
 */
        },
        error: function(response) {
            console.log(error);
        }
    });
});