<?php
require 'conexion.php';

$id  = $_GET['id'];
$sql = $conexion->prepare("DELETE  FROM usuarios WHERE id = :id");

$resultado = $sql->execute(array(':id' => $id));

header('location:usuario_inactivo.php');
