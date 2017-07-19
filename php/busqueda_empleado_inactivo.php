
<?php
require "conexion.php";

$sinresultado = '';

$name = "%" . $_GET["txtName"] . "%";
$stmt = $conexion->prepare('SELECT emp.id,emp.usuario_id,emp.nombre,emp.apellido,emp.cargo,emp.interno,emp.telmovil,emp.jefe_id,emp.direccion_id


FROM empleados emp


WHERE emp.id=emp.id and emp.estado=0 and emp.nombre LIKE ? GROUP BY emp.id  ORDER BY emp.nombre  ASC ');

$stmt->execute(array($name));

$result = $stmt->fetchAll();

if ($result == false) {
    $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
}

require '../views/empleados/busqueda_empleados_inactivos.view.php';
