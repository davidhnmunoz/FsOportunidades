<?php
require 'conexion.php';

$id  = $_GET['id'];
$sql = $conexion->prepare("DELETE  FROM usuarios WHERE id = :id");

$resultado = $sql->execute(array(':id' => $id));

$direccion_id = $_GET['direccion_id'];
$sql1         = $conexion->prepare("DELETE FROM direcciones WHERE id=:direccion_id");
$resultado1   = $sql1->execute(array(':direccion_id' => $direccion_id));

header('location:usuario_inactivo.php');
