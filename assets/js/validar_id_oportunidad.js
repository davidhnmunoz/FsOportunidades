$(document).ready(function() {
    $('#idoportunidad').blur(function() {
        $('#Infoopor').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var idoportunidad = $(this).val();
        var dataString = 'idoportunidad=' + idoportunidad;
        $.ajax({
            type: "POST",
            url: "../php/validar_id_oportunidad.php",
            data: dataString,
            success: function(data) {
                $('#Infoopor').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});