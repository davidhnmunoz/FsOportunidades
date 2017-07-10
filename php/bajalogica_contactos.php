<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id     = $_GET['id'];
$estado = 0;

$statement = $conexion->prepare('UPDATE  contactos SET estado = :estado WHERE id = :id');

$statement->execute(array(
    ':id' => $id, ':estado' => $estado));

header('location: index_contactos.php ');
