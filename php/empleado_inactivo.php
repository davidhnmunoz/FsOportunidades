
<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$empleados = $conexion->prepare("SELECT emp.id,emp.usuario_id,emp.nombre,emp.apellido,emp.cargo,emp.interno,emp.telmovil,emp.jefe_id,emp.direccion_id


FROM empleados emp


WHERE emp.id=emp.id and estado=0 GROUP BY emp.id  ORDER BY emp.nombre ASC");
$rempleados = $empleados->execute();
$rempleados = $empleados->fetchAll(PDO::FETCH_OBJ);

require '../views/empleados/empleado_inactivo.view.php';
