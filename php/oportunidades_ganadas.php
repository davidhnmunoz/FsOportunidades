<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$oportunidades = $conexion->prepare("SELECT opu.id as 'opu_id',opu.ingresos_reales,opu.fecha_cierre,opu.tema,are.tipoarea_id ,tare.descripcion as 'area'  ,cue.id as 'cue_id' ,cue.nombreempresa,usu.id as 'usu_id',
emp.nombre as 'nombreempleado', emp.apellido as 'apellidoempleado',testo.descripcion as 'estado'


FROM oportunidades opu
JOIN usuarios usu ON opu.usuario_id=usu.id
JOIN empleados emp ON usu.id=emp.usuario_id
JOIN cuentas cue ON opu.cuenta_id=cue.id
JOIN areas are ON opu.id=are.oportunidad_id
JOIN tipos_areas tare ON  are.tipoarea_id=tare.id
JOIN estado_oportunidades esto ON opu.id=esto.oportunidad_id
JOIN tipos_estado testo ON esto.tipos_estado_id=testo.id





WHERE testo.id=3 order by opu.fecha_cierre asc");
$oportunidades->execute();
$roportunidades = $oportunidades->execute();
$roportunidades = $oportunidades->fetchAll(PDO::FETCH_OBJ);

require '../views/oportunidades/oportunidades_ganadas.view.php';
