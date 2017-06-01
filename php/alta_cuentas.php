<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id        = $_GET['id'];
$estado    = 1;
$statement = $conexion->prepare('UPDATE  cuentas SET estado = :estado WHERE id = :id  ');

$statement->execute(array(
    ':id' => $id, ':estado' => $estado));

header('location: cuentas_inactivas.php');
