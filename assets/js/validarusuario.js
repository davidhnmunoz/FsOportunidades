$(document).ready(function() {
    $('#username').blur(function() {
        $('#Info').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var username = $(this).val();
        var dataString = 'username=' + username;
        $.ajax({
            type: "POST",
            url: "../php/validacion_usuario.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});