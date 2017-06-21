<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$cuentas = $conexion->prepare('SELECT cue.id as "id", con.nombre as "nombrecontacto", con.apellido as "apellidocontacto",
cue.nombreempresa ,cue.sitioweb,cue.cuit,cue.descripcion, cue.telefono,
 emp.nombre, emp.apellido,usu.id as "usuario_id",usu.usuario,
 dir.CodPostal, prov.nombre as "provincia" ,
 dep.nombre as "departamento", loc.nombre as "localidad"

FROM cuentas cue JOIN usuarios usu ON cue.usuario_id=usu.id
 JOIN contactos con ON cue.id=con.cuenta_id
JOIN empleados emp ON usu.id=emp.usuario_id
JOIN direcciones dir ON cue.direccion_id=dir.id
JOIN provincias prov ON dir.provincia_id=prov.id
JOIN departamentos dep ON dir.departamento_id=dep.id
JOIN localidades loc ON dir.localidad_id=loc.id


WHERE cue.id=cue.id and estado=1  GROUP BY cue.id  ORDER BY nombreempresa ASC');
$rcuentas = $cuentas->execute();
$rcuentas = $cuentas->fetchAll(PDO::FETCH_OBJ);

require '../views/cuentas/index_cuenta.view.php';
