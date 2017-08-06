$(function() {
    /*Lista de cuentas Esta funcion se ejecuta cuando
     carga la pagina completa el selector con los datos de la cuenta*/
    $.post('select_area.php').done(function(respuesta) {
        $('#area').html(respuesta);
    });
    //Lista de contactos
    /*Esta funcion se ejecuta cuando se selecciona el continenete via POST 
    retorna los campos de los contactos relativos a la cuenta elegida*/
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