$(document).ready(function() {
    $('#idcuenta').blur(function() {
        $('#Info').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var idcuenta = $(this).val();
        var dataString = 'idcuenta=' + idcuenta;
        $.ajax({
            type: "POST",
            url: "../php/validar_id_cuenta.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});