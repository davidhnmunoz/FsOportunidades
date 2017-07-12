
<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
//agregar

$errorid_c = '';
$enviado   = '';
$enviar    = '';

if (isset($_POST['agregar'])) {

    $nombre          = $_POST['nombre'];
    $apellido        = $_POST['apellido'];
    $cargo           = $_POST['cargo'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $telmovil        = $_POST['telmovil'];
    $interno         = $_POST['interno'];
    $notas           = $_POST['notas'];
    $usuario_id      = $_POST['usuario_id'];
    $jefe_id         = $_POST['jefe_id'];
    $estado          = 1;
/*Tabla direcciones*/
    $direccion_id = $_POST['direccion_id'];
    $provincia    = $_POST['provincia'];
    $departamento = $_POST['departamento'];
    $localidad    = $_POST['localidad'];
    $direccion    = $_POST['direccion'];

    /*Validacion direccion_id en tabla direcciones*/
    $vid_c = $conexion->prepare('SELECT * FROM direcciones WHERE id=:direccion_id');
    $vid_c->execute(array(':direccion_id' => $direccion_id));
    $resultadoid_c = $vid_c->fetch();

    if ($resultadoid_c == true) {
        $errorid_c .= '<strong>ID ciudad en uso</strong>';
    } else {
        /*Insert a tabla direcciones*/
        $query = $conexion->prepare('INSERT INTO direcciones (id,provincia_id,departamento_id, localidad_id ,CodPostal)
 VALUES (:direccion_id,:provincia,:departamento,:localidad,:direccion )');

        $query->execute(array(
            ':direccion_id' => $direccion_id,
            ':provincia'    => $provincia,
            ':departamento' => $departamento,
            ':localidad'    => $localidad,
            ':direccion'    => $direccion));
        /*Insert A Tabla cuentas*/
        $sql = $conexion->prepare('INSERT INTO empleados (nombre , apellido , cargo , fechanacimiento,telmovil,interno,notas,jefe_id,direccion_id,usuario_id, estado)

            VALUES (:nombre , :apellido , :cargo ,:fechanacimiento,:telmovil,:interno,:notas,:jefe_id,:direccion_id,:usuario_id,:estado )');

        $sql->execute(array(

            ':nombre'          => $nombre,
            ':apellido'        => $apellido,
            ':cargo'           => $cargo,
            ':fechanacimiento' => $fechanacimiento,
            ':telmovil'        => $telmovil,
            ':interno'         => $interno,
            ':notas'           => $notas,
            ':jefe_id'         => $jefe_id,
            ':direccion_id'    => $direccion_id,
            ':usuario_id'      => $usuario_id,
            ':estado'          => $estado));

        $enviado .= 'Ha creado el empleado correctamente!';
        $enviar .= '<meta http-equiv="refresh" content="2;url=index_empleados.php">';
    }
}

include '../views/empleados/agregar_empleados.view.php';

?>
