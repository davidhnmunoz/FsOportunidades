<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id = $_GET['id'];

$oportunidades = $conexion->prepare("SELECT opu.id as 'opu_id',opu.tema,are.tipoarea_id ,opu.fecha_modificacion,opu.fecha_cierre,opu.fecha_alta,
opu.ingresos_estimados,opu.importe_presupuesto,opu.importe,opu.ingresos_reales,
opu.situacionactual,opu.necesidadcliente,opu.descripcion,opu.solucionpropuesta,
tare.descripcion as 'area'  ,cue.id as 'cue_id' ,cue.nombreempresa,con.id as 'con_id', con.nombre AS 'nombrecontacto',
con.apellido AS 'apellidocontacto',con.email,con.telefono,emp.nombre,emp.apellido


FROM oportunidades opu
JOIN usuarios usu ON opu.usuario_id=usu.id
JOIN empleados emp ON usu.id=emp.usuario_id
JOIN cuentas cue ON opu.cuenta_id=cue.id
JOIN contactos con ON opu.contacto_id=con.id
JOIN areas are ON opu.id=are.oportunidad_id
JOIN tipos_areas tare ON  are.tipoarea_id=tare.id


WHERE opu.id=$id");
$oportunidades->execute();
$roportunidades = $oportunidades->execute();
$roportunidades = $oportunidades->fetchAll(PDO::FETCH_OBJ);

require '../views/oportunidades/oportunidad_individual.view.php';
