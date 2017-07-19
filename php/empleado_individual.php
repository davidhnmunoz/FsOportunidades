<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id      = $_GET['id'];
$jefe_id = $_GET['jefe_id'];

$empleados = $conexion->prepare('SELECT emp.id , emp.nombre , emp.apellido ,emp.cargo,emp.jefe_id,
emp.fechanacimiento,emp.telmovil,emp.interno ,emp.notas,
dir.CodPostal, prov.nombre as "provincia" ,
 dep.nombre as "departamento", loc.nombre as "localidad",
  usu.id,usu.fecha_alta,usu.fecha_baja,usu.usuario

FROM empleados emp
JOIN usuarios usu ON emp.usuario_id=usu.id
JOIN direcciones dir ON emp.direccion_id=dir.id
JOIN provincias prov ON dir.provincia_id=prov.id
JOIN departamentos dep ON dir.departamento_id=dep.id
JOIN localidades loc ON dir.localidad_id=loc.id


WHERE emp.id=:id LIMIT 1');
$empleados->execute(array(
    ':id' => $id));
$rempleados = $empleados->fetchAll(PDO::FETCH_OBJ);

$jefes = $conexion->prepare('SELECT emp.nombre,emp.apellido


FROM empleados emp
JOIN jefes jef ON emp.id=jef.empleado_id


WHERE jef.id=:jefe_id
');
$jefes->execute(array(
    ':jefe_id' => $jefe_id));
$rjefes = $jefes->fetchAll(PDO::FETCH_OBJ);

require '../views/empleados/empleado_individual.view.php';
