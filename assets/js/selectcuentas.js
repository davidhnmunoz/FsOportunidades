$(function() {
    /*Lista de cuentas Esta funcion se ejecuta cuando
     carga la pagina completa el selector con los datos de la cuenta*/
    $.post('select_cuenta.php').done(function(respuesta) {
        $('#cuenta').html(respuesta);
    });
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