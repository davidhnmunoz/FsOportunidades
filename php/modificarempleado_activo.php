<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
//EDITAR

$errorcuit = '';
$enviado   = '';
$enviar    = '';

//Saco los datos del empleado
if (isset($_GET['id'])) {

    $id      = $_GET["id"];
    $jefe_id = $_GET['jefe_id'];
    $sql     = $conexion->prepare("SELECT * FROM  empleados WHERE id =:id");
    $sql->execute(array(':id' => $id));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

// if (isset($_POST['modificar'])) {
//     $idUsu           = $_POST["id"];
//     $nombre          = $_POST['nombre'];
//     $apellido        = $_POST['apellido'];
//     $cargo           = $_POST['cargo'];
//     $fechanacimiento = $_POST['fechanacimiento'];
//     $telmovil        = $_POST['telmovil'];
//     $interno         = $_POST['interno'];
//     $notas           = $_POST['notas'];
//     $usuario_id      = $_POST['usuario_id'];
//     $jefe_id         = $_POST['jefe_id'];

// /*Tabla direcciones*/
//     $direccion_id = $_POST['direccion_id'];
//     $provincia    = $_POST['provincia'];
//     $departamento = $_POST['departamento'];
//     $localidad    = $_POST['localidad'];
//     $direccion    = $_POST['direccion'];

// } else {

//     $sql       = "UPDATE empleados SET nombre=:nombre , apellido=:apellido ,cargo=:cargo, fechanacimiento=:fechanacimiento,telmovil=:telmovil , interno=:interno, notas=:notas, direccion_id=:direccion_id, usuario_id=:usuario_id  WHERE id=:idUsu";
//     $resultado = $conexion->prepare($sql);
//     $resultado->execute(array(
//         ":nombre"          => $nombre,
//         ":apellido"        => $apellido,
//         ":cargo"           => $cargo,
//         ":fechanacimiento" => $fechanacimiento,
//         ":telmovil"        => $telmovil,
//         ":interno"         => $interno,
//         ":notas"           => $notas,
//         ":jefe_id "        => $jefe_id,
//         ":direccion_id"    => $direccion_id,
//         ":usuario_id"      => $usuario_id));
//     /*Insert a tabla direcciones
//      */

//     $query      = "UPDATE  direcciones SET provincia_id=:provincia ,departamento_id=:departamento, localidad_id=:localidad ,CodPostal=:direccion WHERE id=$direccion_id";
//     $resultado0 = $conexion->prepare($query);
//     $resultado0->execute(array(
//         ":provincia"    => $provincia,
//         ":departamento" => $departamento,
//         ":localidad"    => $localidad,
//         ":direccion"    => $direccion));

//     header('location:index_empleados.php?exito');

// }

require '../views/empleados/modificarempleados_activos.view.php';
