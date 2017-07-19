<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id         = $_GET['id'];
$fecha_alta = date("Y-m-d");
$estado     = 1;

$statement = $conexion->prepare('UPDATE  usuarios SET estado = :estado,fecha_alta=:fecha_alta  WHERE id = :id');

$statement->execute(array(
    ':id' => $id, ':estado' => $estado, ':fecha_alta' => $fecha_alta));

$statement1 = $conexion->prepare('UPDATE empleados SET estado = :estado WHERE usuario_id =:id');

$statement1->execute(array(
    ':id'     => $id,
    ':estado' => $estado));

header('location: index_usuarios.php');
