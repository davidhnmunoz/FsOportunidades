<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$id       = $_SESSION['idusuario'];
$sindatos = '';
$sql      = $conexion->prepare('SELECT INTERVAL 90 DAY +   alta_pass AS cambiar_pass FROM usuarios WHERE id=:id');
$sql->bindValue(':id', $id);
$sql->execute();
$passconsultada = $sql->fetch(PDO::FETCH_COLUMN);
$hoy            = date('Y-m-d');

if ($hoy >= $passconsultada) {

    header('location:cambio_pass.php');
}

$oportunidades = $conexion->prepare("SELECT opu.id as 'opu_id',opu.tema,are.tipoarea_id ,tare.descripcion as 'area',testo.id,testo.descripcion  ,cue.id as 'cue_id' ,cue.nombreempresa,con.id as 'con_id', con.nombre,con.apellido,con.email,con.telefono


FROM oportunidades opu
JOIN usuarios usu ON opu.usuario_id=usu.id
JOIN cuentas cue ON opu.cuenta_id=cue.id
JOIN contactos con ON opu.contacto_id=con.id
JOIN areas are ON opu.id=are.oportunidad_id
JOIN tipos_areas tare ON  are.tipoarea_id=tare.id
JOIN estado_oportunidades esto ON opu.id=esto.oportunidad_id
JOIN tipos_estado testo ON esto.tipos_estado_id=testo.id


WHERE usu.id=$id AND testo.id=2");
$oportunidades->execute();
$roportunidades = $oportunidades->execute();
$roportunidades = $oportunidades->fetchAll(PDO::FETCH_OBJ);

require '../views/oportunidades/index_oportunidades.view.php';
