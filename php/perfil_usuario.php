<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id = $_SESSION['idusuario'];
/*Select Nombre*/

$nombre = $conexion->prepare("SELECT emp.nombre,emp.apellido


FROM

usuarios usu JOIN
empleados emp ON usu.id=emp.usuario_id

WHERE usu.id=$id");
$rnombre = $nombre->execute();
$rnombre = $nombre->fetchAll(PDO::FETCH_OBJ);

/*Select Cuenta*/
/*cantidad cuentas*/
$cantcuentas = $conexion->prepare("SELECT count(cue.usuario_id) as 'cantidadcuentas'



FROM


cuentas cue


WHERE cue.usuario_id=$id");

$cantcuentas->execute();
$rcantcuentas = $cantcuentas->fetchAll(PDO::FETCH_OBJ);

/*termina cantidad cuentas*/

/*SELECT Contactos*/

$cantcontactos = $conexion->prepare("SELECT count(con.usuario_id) as 'cantidadcontactos'



FROM


contactos con


WHERE con.usuario_id=$id");

$cantcontactos->execute();
$rcantcontactos = $cantcontactos->fetchAll(PDO::FETCH_OBJ);

/*Termina Select Contactos*/

/*Empieza Select oportunidades*/

/*Total Oportunidades*/
$oport = $conexion->prepare("SELECT count(opu.usuario_id) as 'cantidadoportunidades' FROM oportunidades opu


WHERE opu.usuario_id=$id");

$oport->execute();
$roport = $oport->fetchAll(PDO::FETCH_OBJ);
/*termina Total Oportunidades*/

/*Oportunidades ganadas*/
$oportg = $conexion->prepare("SELECT count(opu.usuario_id) as 'ganadas'



FROM


oportunidades opu
JOIN estado_oportunidades esto ON
opu.id=esto.oportunidad_id


WHERE opu.usuario_id=$id and esto.tipos_estado_id=3");

$oportg->execute();
$roportg = $oportg->fetchAll(PDO::FETCH_OBJ);

/*Terminada Gandas*/

/*Oportunidades en proceso*/
$oportep = $conexion->prepare("SELECT count(opu.usuario_id) as 'enproceso'



FROM


oportunidades opu
JOIN estado_oportunidades esto ON
opu.id=esto.oportunidad_id


WHERE opu.usuario_id=$id and esto.tipos_estado_id=2");

$oportep->execute();
$roportep = $oportep->fetchAll(PDO::FETCH_OBJ);
/*Terminada proceso*/

/*Oportunidades Perdidas*/
/*Terminada perdidas*/
$oportp = $conexion->prepare("SELECT count(opu.usuario_id) as 'perdidas'



FROM


oportunidades opu
JOIN estado_oportunidades esto ON
opu.id=esto.oportunidad_id


WHERE opu.usuario_id=$id and esto.tipos_estado_id=1");

$oportp->execute();
$roportp = $oportp->fetchAll(PDO::FETCH_OBJ);

/*Termina Select Oportunidades*/

/*Select Actividad*/

/*Actividad Cuentas*/

$actcuentas = $conexion->prepare("SELECT cue.nombreempresa,cue.id AS 'cue_id', cue.fecha_alta,emp.nombre,emp.apellido




FROM cuentas cue
JOIN empleados emp ON cue.usuario_id=emp.usuario_id

WHERE cue.usuario_id=$id and cue.estado=1 group by cue.fecha_alta desc ");

$actcuentas->execute(array(':id' => $id));
$ractcuentas = $actcuentas->fetchAll(PDO::FETCH_OBJ);

/*termina actividad Cuentas*/

/*Empieza actividad contactos*/

$actcont = $conexion->prepare("SELECT con.id as 'con_id',con.nombre as 'nomcon',con.apellido as 'apecont',
emp.nombre as 'empnom',emp.apellido as 'empape'




FROM contactos con
JOIN empleados emp ON con.usuario_id=emp.usuario_id

WHERE con.usuario_id=$id ");

$actcont->execute(array(':id' => $id));
$ractcont = $actcont->fetchAll(PDO::FETCH_OBJ);

/*termina actividad contactos*/

/*empieza select Oportunidad*/
$actopu = $conexion->prepare("SELECT opu.id as 'opu_id',opu.tema,opu.fecha_alta,emp.nombre,emp.apellido

FROM oportunidades opu
JOIN empleados emp ON opu.usuario_id=emp.usuario_id

WHERE opu.usuario_id=$id GROUP BY opu.fecha_alta DESC");

$actopu->execute(array(':id' => $id));
$ractopu = $actopu->fetchAll(PDO::FETCH_OBJ);

/*Oportunidades Ganadas*/
$opug = $conexion->prepare("SELECT opu.id as 'opu_id',opu.tema,emp.nombre,emp.apellido,opu.fecha_cierre,opu.ingresos_reales




FROM oportunidades opu
JOIN empleados emp ON opu.usuario_id=emp.usuario_id
JOIN estado_oportunidades esto ON opu.id=esto.oportunidad_id


WHERE opu.usuario_id=$id and esto.tipos_estado_id=3 ");

$opug->execute(array(':id' => $id));
$ropug = $opug->fetchAll(PDO::FETCH_OBJ);

/*Termina oportunidades Ganadas*/

/*Empieza oportunidades en proceso*/
$opup = $conexion->prepare(" SELECT opu.id as 'opu_id',opu.tema,emp.nombre,emp.apellido,opu.fecha_cierre,opu.ingresos_reales




FROM oportunidades opu
JOIN empleados emp ON opu.usuario_id=emp.usuario_id
JOIN estado_oportunidades esto ON opu.id=esto.oportunidad_id


WHERE opu.usuario_id=$id and esto.tipos_estado_id=1");

$opup->execute(array(':id' => $id));
$ropup = $opup->fetchAll(PDO::FETCH_OBJ);
/*Termina Oportunidades en proceso*/

/*termina oportunidades*/

/*Termina Select Actividad*/

require '../views/usuarios/perfil_usuario.view.php';
