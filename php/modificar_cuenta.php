<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
//EDITAR

$errorcuit = '';
$enviado   = '';
$enviar    = '';

if (!isset($_POST['editar'])) {
    $id       = $_GET['id'];
    $scuentas = $conexion->prepare("SELECT * FROM cuentas WHERE 	id
	= $id");
    $scuentas->execute();
    $sdirecciones = $conexion->prepare("SELECT dir.id,prov.id as 'provincia',dep.id as
    	'departamento',loc.id as 'localidad',dir.CodPostal
FROM cuentas cue JOIN direcciones dir ON cue.direccion_id=dir.id
JOIN provincias prov ON prov.id=dir.provincia_id
JOIN departamentos dep ON dep.id=dir.departamento_id
JOIN localidades loc ON loc.id=dir.localidad_id

WHERE	cue.id= $id");
    $sdirecciones->execute();

} else {
    $id            = $_POST['id'];
    $cuit          = $_POST['cuit'];
    $nombreempresa = $_POST['nombreempresa'];
    $telefono      = $_POST['telefono'];
    $fax           = $_POST['fax'];
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

    /*Validacion Cuit cuentas*/
    $vcuit = $conexion->prepare('SELECT * FROM cuentas WHERE cuit = :cuit LIMIT 1');
    $vcuit->execute(array(':cuit' => $cuit));
    $resultadocuit = $vcuit->fetch();

    if ($resultadocuit == true) {
        $errorcuit .= '<strong> Cuit Ya Ingresado!</strong>';
    } else {
        /*Insert a tabla direcciones*/
        $query = $conexion->prepare('UPDATE  direcciones SET (id=:direccion_id,provincia_id=:provincia=,departamento_id=:departamento, localidad_id=:localidad ,CodPostal=:direccion WHERE id=:direccion_id');

        $query->execute(array(
            ':direccion_id' => $direccion_id,
            ':provincia'    => $provincia,
            ':departamento' => $departamento,
            ':localidad'    => $localidad,
            ':direccion'    => $direccion));
        /*Insert A Tabla cuentas*/
        $sql = $conexion->prepare('UPDATE cuentas (id=:id,nombreempresa=:nombreempresa , telefono=:telefono ,fax=:fax ,sitioweb=:sitioweb, cuit=:cuit,descripcion=:descripcion,direccion_id=:direccion_id,usuario_id=:usuario_id, estado=:estado WHERE id=:id');

        $sql->execute(array(
            ':id'            => $id,
            ':nombreempresa' => $nombreempresa,
            ':telefono'      => $telefono,
            ':fax'           => $fax,
            ':sitioweb'      => $sitioweb,
            ':cuit'          => $cuit,
            ':descripcion'   => $descripcion,
            ':direccion_id'  => $direccion_id,
            ':usuario_id'    => $usuario_id,
            ':estado'        => $estado));

        /*Insertar a la tabla Origenes*/
        $sql1 = $conexion->prepare('UPDATE origenes (cuenta_id=:id,tipoorigen_id=:tiorigen WHERE cuenta_id=:id');

        $sql1->execute(array(
            ':id'       => $id,
            ':tiorigen' => $tiorigen));

        /*Insertar a la tabla Propiedades*/
        $sql2 = $conexion->prepare('UPDATE propiedades (cuenta_id=:id,tipopropiedad_id=:tiprop WHERE cuenta_id=:id');

        $sql2->execute(array(':id' => $id,
            ':tiprop'                  => $tiprop));

        /*Insertar a la tabla Organizacion*/
        $sql3 = $conexion->prepare('UPDATE organizaciones (cuenta_id=:id,tipoorganizacion_id=:tiorga

       WHERE  cuenta_id=:id');

        $sql3->execute(array(':id' => $id,
            ':tiorga'                  => $tiorga));
        /*Insertar a la tabla Numero empleados*/

        $sql4 = $conexion->prepare('UPDATE numeroempleados (cuenta_id=:id,tiponumeroempleados_id=:tinemp
   			WHERE  cuenta_id=:id');

        $sql4->execute(array(':id' => $id,
            ':tinemp'                  => $tinemp));

        /*Insertar a la tabla Sectores*/
        $sql5 = $conexion->prepare('UPDATE sectores (cuenta_id=:id,tiposector_id=:tisec
        	WHERE  cuenta_id=:id');

        $sql5->execute(array(':id' => $id,
            ':tisec'                   => $tisec));

        $enviado .= 'Ha creado La cuenta correctamente!';
        $enviar .= '<meta http-equiv="refresh" content="2;url=index_cuenta.php">';

    }
}

require '../views/cuentas/modificar_cuenta.view.php';
