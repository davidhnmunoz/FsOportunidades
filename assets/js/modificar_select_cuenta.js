$(function() {
    //Lista de contactos
    /*Esta funcion se ejecuta cuando se selecciona el continenete via POST 
    retorna los campos de los contactos relativos a la cuenta elegida*/
    $('#cuenta').change(function() {
        var la_cuenta = $(this).val();
        // Lista de contactos
        $.post('select_contacto.php', {
            cuenta: la_cuenta
        }).done(function(respuesta) {
            $('#contacto').html(respuesta);
        });
    });
})