<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id = $_SESSION['idusuario'];

$sql = $conexion->prepare('SELECT INTERVAL 90 DAY +   alta_pass AS cambiar_pass FROM usuarios WHERE id=:id');
$sql->bindValue(':id', $id);
$sql->execute();
$passconsultada = $sql->fetch(PDO::FETCH_COLUMN);
$hoy            = date('Y-m-d');

if ($hoy >= $passconsultada) {
    header('location:cambio_pass.php');
}

$oportunidades = $conexion->prepare('SELECT * FROM oportunidades Where estado = 1');
$oportunidades->execute();
$roportunidades = $oportunidades->execute();
$roportunidades = $oportunidades->fetchAll(PDO::FETCH_OBJ);

require '../views/index.view.php';
