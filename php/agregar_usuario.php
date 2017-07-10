 <?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
$errorid = '';
$enviado = '';
$enviar  = '';
if (isset($_POST['agregar'])) {
    $id         = $_POST['id'];
    $usuario    = $_POST['usuario'];
    $pass       = $_POST['pass'];
    $rol        = $_POST['rol'];
    $fecha_alta = $_POST['fecha_alta'];
    $estado     = 1;
/*Validacion id cuentas*/
    $vid = $conexion->prepare('SELECT * FROM usuarios WHERE id = :id');
    $vid->execute(array(':id' => $id));
    $resultadoid = $vid->fetch();

    if ($resultadoid == true) {
        $errorid .= '<strong>ID en uso</strong>';
    } else {
        /*Insert A Tabla usuario*/

        $sql = $conexion->prepare('INSERT INTO usuarios (id, usuario , pass , estado,fecha_alta )

            VALUES (:id, :usuario ,:pass ,:estado, :fecha_alta )');

        $sql->execute(array(
            ':id'         => $id,
            ':usuario'    => $usuario,
            ':pass'       => $pass,
            ':estado'     => $estado,
            ':fecha_alta' => $fecha_alta));

        /*Insert A Tabla Roles*/
        $sql1 = $conexion->prepare('INSERT INTO roles (tiposroles_id,usuario_id )

            VALUES (:rol ,:id  )');

        $sql1->execute(array(
            ':rol' => $rol,
            ':id'  => $id,

        ));

        $enviado .= 'Ha creado el usuario correctamente!';
        $enviar .= '<meta http-equiv="refresh" content="2;url=index_usuarios.php">';

    }

}
include '../views/usuarios/agregar_usuario.view.php';
