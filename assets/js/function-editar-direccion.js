$(function() {
    /*Lista de provincias Esta funcion se ejecuta cuando
     carga la pagina completa el selector con los datos de la provincia*/
    //Lista de departamentos
    /*Esta funcion se ejecuta cuando se selecciona el continenete via POST 
    retorna los campos de los departamentos relativos a la provincias elegida*/
    $('#provincia').change(function() {
        var la_provincia = $(this).val();
        // Lista de departamentos
        $.post('modificar_departamentos.php', {
            provincia: la_provincia
        }).done(function(respuesta) {
            $('#departamento').html(respuesta);
        });
    });
    // Lista de Localidades
    $('#departamento').change(function() {
        //var departamentos = $(this).children('option:selected').html();
        // alert('Lista de localidades de ' + departamentos);
        var el_departamento = $(this).val();
        // Lista de departamentos
        $.post('modificar_localidades.php', {
            departamento: el_departamento
        }).done(function(respuesta) {
            $('#localidad').html(respuesta);
        });
    });
})