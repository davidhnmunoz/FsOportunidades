<?php
require 'conexion.php';

$id  = $_GET['id'];
$sql = $conexion->prepare("DELETE  FROM contactos WHERE id = :id");

$resultado = $sql->execute(array(':id' => $id));

header('location:contactos_inactivos.php');
