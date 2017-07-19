
<?php
require 'conexion.php';

$usuario_id = $_GET['usuario_id'];
$sql        = $conexion->prepare("DELETE  FROM usuarios WHERE id = :usuario_id");

$resultado = $sql->execute(array(':usuario_id' => $usuario_id));

$direccion_id = $_GET['direccion_id'];
$sql1         = $conexion->prepare("DELETE FROM direcciones WHERE id=:direccion_id");
$resultado1   = $sql1->execute(array(':direccion_id' => $direccion_id));

header('location:empleado_inactivo.php');