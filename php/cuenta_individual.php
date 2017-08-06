<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id = $_GET['id'];
/*Cuentas Tipos seleccion indivudal desde el index*/
$cuentas = $conexion->prepare('SELECT cue.id ,cue.nombreempresa,cue.fecha_alta  ,cue.telefono,cue.sitioweb,cue.cuit,cue.descripcion, cue.telefono, emp.nombre, emp.apellido, dir.CodPostal, prov.nombre as "provincia" ,
 dep.nombre as "departamento", loc.nombre as "localidad"


FROM cuentas cue JOIN usuarios usu ON cue.usuario_id=usu.id

JOIN empleados emp ON usu.id=emp.usuario_id
JOIN direcciones dir ON cue.direccion_id=dir.id
JOIN provincias prov ON dir.provincia_id=prov.id
JOIN departamentos dep ON dir.departamento_id=dep.id
JOIN localidades loc ON dir.localidad_id=loc.id
WHERE cue.id=:id ');

$cuentas->execute(array(
    ':id' => $id));
$rcuentas = $cuentas->fetchAll(PDO::FETCH_OBJ);

/*Recorrido Contactos*/

$contactos = $conexion->prepare('SELECT cue.id , con.nombre as "nombrecontacto", con.apellido as "apellidocontacto",con.id as "con_id",con.telefono,con.email




FROM cuentas cue JOIN usuarios usu ON cue.usuario_id=usu.id
 JOIN contactos con ON cue.id=con.cuenta_id

WHERE cue.id=:id');
$contactos->execute(array(
    ':id' => $id));
$rcontactos = $contactos->fetchAll(PDO::FETCH_OBJ);

/*Recorrido de Tablas satelites*/

$cuentasin = $conexion->prepare('SELECT cue.id, cue.nombreempresa, tori.descripcion as "origen", tprop.descripcion as "propiedades", torg.descripcion as "organizacion", tnemp.descripcion as " cantidadempleados", tsec.descripcion as "sector"

FROM cuentas cue JOIN origenes ori ON cue.id                     = ori.cuenta_id
JOIN tipos_origenes tori ON ori.tipoorigen_id                    = tori.id
JOIN propiedades prop ON cue.id                                  = prop.cuenta_id
JOIN tipos_propiedades tprop ON prop.tipopropiedad_id            = tprop.id
JOIN organizaciones org ON cue.id                                = org.cuenta_id
JOIN tipos_organizaciones torg ON org.tipoorganizacion_id        = torg.id
JOIN numeroempleados nemp ON cue.id                              = nemp.cuenta_id
JOIN tipos_numerosempleados tnemp ON nemp.tiponumeroempleados_id = tnemp.id
JOIN sectores sec ON cue.id                                      = sec.cuenta_id
JOIN tipos_sectores tsec ON sec.tiposector_id                    = tsec.id
WHERE cue.id=:id');
$cuentasin->execute(array(
    ':id' => $id));

$rcuentasin = $cuentasin->fetchAll(PDO::FETCH_OBJ);

require '../views/cuentas/cuenta_individual.view.php';
