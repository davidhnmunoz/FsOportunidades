<?php
require 'conexion.php';

$id  = $_GET['id'];
$sql = $conexion->prepare("DELETE  FROM cuentas WHERE id = :id");

$resultado = $sql->execute(array(':id' => $id));

header('location:cuentas_inactivas.php');
