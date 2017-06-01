<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

// $cuentas = $conexion->prepare('SELECT * FROM cuentas ');
// $cuentas->execute();

$cuentasin = $conexion->prepare('SELECT cue.id as "id", con.nombre as "nombrecontacto", con.apellido as "apellidocontacto",cue.nombreempresa  ,cue.telefono,cue.sitioweb,cue.cuit,cue.descripcion, cue.telefono, emp.nombre, emp.apellido, dir.CodPostal, prov.nombre as "provincia" ,
 dep.nombre as "departamento", loc.nombre as "localidad"

FROM cuentas cue JOIN usuarios usu ON cue.usuario_id=usu.id
 JOIN contactos con ON cue.id=con.cuenta_id
JOIN empleados emp ON usu.id=emp.usuario_id
JOIN direcciones dir ON cue.direccion_id=dir.id
JOIN provincias prov ON dir.provincia_id=prov.id
JOIN departamentos dep ON dir.departamento_id=dep.id
JOIN localidades loc ON dir.localidad_id=loc.id

WHERE cue.id=cue.id and estado=0  GROUP BY cue.id  ORDER BY nombreempresa ASC');
$rcuentasin = $cuentasin->execute();
$rcuentasin = $cuentasin->fetchAll(PDO::FETCH_OBJ);
require '../views/cuentas/cuentas_inactivas.view.php';
