<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

//agregar
$errorid   = '';
$errorcuit = '';
$errorid_c = '';
$enviado   = '';
$enviar    = '';

if (isset($_POST['agregar'])) {
    $id            = $_POST['id'];
    $cuit          = $_POST['cuit'];
    $nombreempresa = $_POST['nombreempresa'];
    $telefono      = $_POST['telefono'];
    $sitioweb      = $_POST['sitioweb'];
    $descripcion   = $_POST['descripcion'];
    $usuario_id    = $_POST['usuario_id'];
    $estado        = 1;
/*Tabla direcciones*/
    $direccion_id = $_POST['direccion_id'];
    $provincia    = $_POST['provincia'];
    $departamento = $_POST['departamento'];
    $localidad    = $_POST['localidad'];
    $direccion    = $_POST['direccion'];
/*Tabla Satelite*/
    $tiorigen = $_POST['tiorigen'];
    $tiprop   = $_POST['tiprop'];
    $tiorga   = $_POST['tiorga'];
    $tinemp   = $_POST['tinemp'];
    $tisec    = $_POST['tisec'];

/*Validacion id cuentas*/
    $vid = $conexion->prepare('SELECT * FROM cuentas WHERE id = :id');
    $vid->execute(array(':id' => $id));
    $resultadoid = $vid->fetch();
    /*Validacion Cuit cuentas*/
    $vcuit = $conexion->prepare('SELECT * FROM cuentas WHERE cuit = :cuit LIMIT 1');
    $vcuit->execute(array(':cuit' => $cuit));
    $resultadocuit = $vcuit->fetch();
    /*Validacion direccion_id en tabla direcciones*/
    $vid_c = $conexion->prepare('SELECT * FROM direcciones WHERE id=:direccion_id');
    $vid_c->execute(array(':direccion_id' => $direccion_id));
    $resultadoid_c = $vid_c->fetch();

    if ($resultadoid == true) {
        $errorid .= '<strong>ID en uso</strong>';
    } elseif ($resultadocuit == true) {
        $errorcuit .= '<strong> Cuit Ya Ingresado!</strong>';
    } elseif ($resultadoid_c == true) {
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
        $sql = $conexion->prepare('INSERT INTO cuentas (id,nombreempresa , telefono , sitioweb , cuit,descripcion,direccion_id,usuario_id, estado)

            VALUES (:id,:nombreempresa , :telefono , :sitioweb , :cuit , :descripcion,:direccion_id,:usuario_id,:estado )');

        $sql->execute(array(
            ':id'            => $id,
            ':nombreempresa' => $nombreempresa,
            ':telefono'      => $telefono,
            ':sitioweb'      => $sitioweb,
            ':cuit'          => $cuit,
            ':descripcion'   => $descripcion,
            ':direccion_id'  => $direccion_id,
            ':usuario_id'    => $usuario_id,
            ':estado'        => $estado));

        /*Insertar a la tabla Origenes*/
        $sql1 = $conexion->prepare('INSERT INTO origenes (cuenta_id,tipoorigen_id)

            VALUES (:id,:tiorigen )');

        $sql1->execute(array(
            ':id'       => $id,
            ':tiorigen' => $tiorigen));

        /*Insertar a la tabla Propiedades*/
        $sql2 = $conexion->prepare('INSERT INTO propiedades (cuenta_id,tipopropiedad_id)

                            VALUES (:id,:tiprop )');

        $sql2->execute(array(':id' => $id,
            ':tiprop'                  => $tiprop));

        /*Insertar a la tabla Organizacion*/
        $sql3 = $conexion->prepare('INSERT INTO organizaciones (cuenta_id,tipoorganizacion_id)

                            VALUES (:id,:tiorga )');

        $sql3->execute(array(':id' => $id,
            ':tiorga'                  => $tiorga));
        /*Insertar a la tabla Numero empleados*/

        $sql4 = $conexion->prepare('INSERT INTO numeroempleados (cuenta_id,tiponumeroempleados_id)

                            VALUES (:id,:tinemp )');

        $sql4->execute(array(':id' => $id,
            ':tinemp'                  => $tinemp));

        /*Insertar a la tabla Sectores*/
        $sql5 = $conexion->prepare('INSERT INTO sectores (cuenta_id,tiposector_id)

                            VALUES (:id,:tisec )');

        $sql5->execute(array(':id' => $id,
            ':tisec'                   => $tisec));

        $enviado .= 'Ha creado La cuenta correctamente!';
        $enviar .= '<meta http-equiv="refresh" content="2;url=index_cuenta.php">';

    }
}
include '../views/cuentas/agregar_cuenta.view.php';
