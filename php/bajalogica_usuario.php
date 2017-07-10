<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id         = $_GET['id'];
$fecha_baja = date("Y-m-d");

$estado = 0;

$statement = $conexion->prepare('UPDATE  usuarios SET estado = :estado, fecha_baja=:fecha_baja WHERE id = :id');

$statement->execute(array(
    ':id'         => $id,
    ':estado'     => $estado,
    ':fecha_baja' => $fecha_baja));

header('location: index_usuarios.php ');
