function validarPass() {
    var password = $('#contra').val();
    var exprecion = /^[a-zA-Z0-9]*$/;
    var expre = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,14}.*$/;
    if (password != '') {
        var caracteres = password.length;
        if (caracteres < 6) {
            $('#pass').append('<p class="alert alert-danger"><strong>La contraseña debe tener 8 Carácteres </strong></p>');
            return false;
        }
    }
    if (!exprecion.test(password)) {
        $('#pass').append('<p class="alert alert-danger"><strong>La contraseña no puede tener carecteres especiales</strong></p>');
        return false;
    }
    if (!expre.test(password)) {
        $('#pass').append('<p class="alert alert-danger"><strong>La contraseña debe ser Alfanumerica. y debe tener Combinacion de Mayusculas y minusculas</strong></p>');
        return false;
    }
    return true;
}