$(document).ready(function() {
    $('#username').blur(function() {
        $('#Infousu').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var username = $(this).val();
        var dataString = 'username=' + username;
        $.ajax({
            type: "POST",
            url: "../php/validar_usuario_modificar.php",
            data: dataString,
            success: function(data) {
                $('#Infousu').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});