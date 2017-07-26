$(document).ready(function() {
    $('#usuario_id').blur(function() {
        $('#Infoid').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var usuario_id = $(this).val();
        var dataString = 'usuario_id=' + usuario_id;
        $.ajax({
            type: "POST",
            url: "../php/validar_id_usuario.php",
            data: dataString,
            success: function(data) {
                $('#Infoid').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});