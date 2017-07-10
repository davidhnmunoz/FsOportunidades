<?php
require "conexion.php";

$sinresultado = '';

$name = "%" . $_GET["txtName"] . "%";
$stmt = $conexion->prepare("SELECT id, nombreempresa,cuit,telefono,sitioweb FROM cuentas where estado=0 AND nombreempresa LIKE ?");

$stmt->execute(array($name));

$result = $stmt->fetchAll();

if ($result == false) {
    $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
}

require '../views/cuentas/buscar_cuenta_inactiva.view.php';
