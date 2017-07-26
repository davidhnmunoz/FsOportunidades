 <?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
$errorid      = '';
$enviado      = '';
$enviar       = '';
$errorusuario = '';
if (isset($_POST['agregar'])) {
    $id         = $_POST['id'];
    $usuario    = $_POST['usuario'];
    $pass       = $_POST['password'];
    $rol        = $_POST['rol'];
    $fecha_alta = $_POST['fecha_alta'];
    $alta_pass  = $_POST['fecha_alta'];
    $estado     = 1;

/*Validacion id cuentas*/
    $vid = $conexion->prepare('SELECT * FROM usuarios WHERE id = :id');
    $vid->execute(array(':id' => $id));
    $resultadoid = $vid->fetch();
/*Validacion id cuentas*/
    $vusu = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $vusu->execute(array(':usuario' => $usuario));
    $resultadousu = $vusu->fetch();
    if ($resultadoid == true) {
        $errorid .= '<strong>ID en uso</strong>';

    } elseif ($resultadousu == true) {
        $errorusuario .= '<strong> El Usuario ya existe</strong>';

    } else {

        /*Insert A Tabla usuario*/

        $sql = $conexion->prepare('INSERT INTO usuarios (id, usuario , pass , estado,fecha_alta,alta_pass )

            VALUES (:id, :usuario ,:pass ,:estado, :fecha_alta,:alta_pass )');

        $sql->execute(array(
            ':id'         => $id,
            ':usuario'    => $usuario,
            ':pass'       => $pass,
            ':estado'     => $estado,
            ':fecha_alta' => $fecha_alta,
            ':alta_pass'  => $alta_pass));

        /*Insert A Tabla Roles*/
        $sql1 = $conexion->prepare('INSERT INTO roles (tiposroles_id,usuario_id )

            VALUES (:rol ,:id  )');

        $sql1->execute(array(
            ':rol' => $rol,
            ':id'  => $id));
        /*Inserto A tabla  usuarios_historias 3 veces el mismo password para que despues se pueda validar*/
        $insertuh1 = $conexion->prepare('INSERT INTO usuarios_historias (pass,usuario_id )

            VALUES (:pass ,:id  )');

        $insertuh1->execute(array(
            ':pass' => $pass,
            ':id'   => $id));
// INSERT 2 A TABLA USUARIOS
        $insertuh2 = $conexion->prepare('INSERT INTO usuarios_historias (pass,usuario_id )

            VALUES (:pass ,:id  )');

        $insertuh2->execute(array(
            ':pass' => $pass,
            ':id'   => $id));
        // INSERT 3 A TABLA USUARIOS
        $insertuh2 = $conexion->prepare('INSERT INTO usuarios_historias (pass,usuario_id )

            VALUES (:pass ,:id  )');

        $insertuh2->execute(array(
            ':pass' => $pass,
            ':id'   => $id));

        $enviado .= 'Ha creado el usuario correctamente!';
        $enviar .= '<meta http-equiv="refresh" content="2;url=index_usuarios.php">';

    }

}
include '../views/usuarios/agregar_usuario.view.php';
