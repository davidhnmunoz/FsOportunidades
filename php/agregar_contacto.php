 <?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
$enviado = '';
$enviar  = '';
if (isset($_POST['agregar'])) {

    $usuario_id = $_SESSION['idusuario'];
    $cuenta_id  = $_POST['cuenta_id'];

    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email    = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado   = 1;

    /*Insert A Tabla cuentas*/
    $sql = $conexion->prepare('INSERT INTO contactos (cuenta_id , usuario_id , nombre , apellido,email,telefono,estado)

            VALUES (:cuenta_id , :usuario_id , :nombre , :apellido,:email,:telefono,:estado )');

    $sql->execute(array(
        ':cuenta_id'  => $cuenta_id,
        ':usuario_id' => $usuario_id,
        ':nombre'     => $nombre,
        ':apellido'   => $apellido,
        ':email'      => $email,
        ':telefono'   => $telefono,
        ':estado'     => $estado));

    $enviado .= 'Ha creado el contacto correctamente!';
    $enviar .= '<meta http-equiv="refresh" content="2;url=index_contactos.php">';
}
include '../views/contactos/agregar_contacto.view.php';
