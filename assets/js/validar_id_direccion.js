$(document).ready(function() {
    $('#direccion_id').blur(function() {
        $('#Infoinfo').html('<img src="../assets/img/loader.gif" alt="" />').fadeOut(1000);
        var direccion_id = $(this).val();
        var dataString = 'direccion_id=' + direccion_id;
        $.ajax({
            type: "POST",
            url: "../php/validar_id_direccion.php",
            data: dataString,
            success: function(data) {
                $('#Infodir').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });
});