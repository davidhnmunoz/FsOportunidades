$(document).ready(function() {
    $('#cuitcuenta').blur(function() {
        $('#Infocuenta').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var cuitcuenta = $(this).val();
        var dataString = 'cuitcuenta=' + cuitcuenta;
        $.ajax({
            type: "POST",
            url: "../php/validar_cuit_cuenta.php",
            data: dataString,
            success: function(data) {
                $('#Infocuenta').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});