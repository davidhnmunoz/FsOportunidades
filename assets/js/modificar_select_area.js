$(function() {
    $('#area').change(function() {
        var el_area = $(this).val();
        // Lista de contactos
        $.post('select_estado.php', {
            area: el_area
        }).done(function(respuesta) {
            $('#estado').html(respuesta);
        });
    });
})