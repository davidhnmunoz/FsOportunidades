
<?php
require "conexion.php";

$sinresultado = '';

$name = "%" . $_GET["txtName"] . "%";
$stmt = $conexion->prepare("SELECT id, nombre,apellido,telefono,email FROM contactos where estado=0 AND nombre LIKE ?  ");

$stmt->execute(array($name));

$result = $stmt->fetchAll();

if ($result == false) {
    $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
}

require '../views/contactos/buscar_contacto_activo.view.php';