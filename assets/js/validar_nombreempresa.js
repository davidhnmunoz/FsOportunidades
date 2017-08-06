$(document).ready(function() {
    $('#nombrecuenta').blur(function() {
        $('#Infonombre').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var nombrecuenta = $(this).val();
        var dataString = 'nombrecuenta=' + nombrecuenta;
        $.ajax({
            type: "POST",
            url: "../php/validacion_nombrecuenta.php",
            data: dataString,
            success: function(data) {
                $('#Infonombre').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});