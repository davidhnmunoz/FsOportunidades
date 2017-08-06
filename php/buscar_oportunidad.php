
<?php
require "conexion.php";

$sinresultado = '';

$name = "%" . $_GET["txtName"] . "%";
$stmt = $conexion->prepare("SELECT opu.id as 'opu_id',opu.tema,are.tipoarea_id ,tare.descripcion as 'area'  ,cue.id as 'cue_id' ,cue.nombreempresa,con.id as 'con_id', con.nombre,con.apellido,con.email,con.telefono


FROM oportunidades opu
JOIN usuarios usu ON opu.usuario_id=usu.id
JOIN cuentas cue ON opu.cuenta_id=cue.id
JOIN contactos con ON opu.contacto_id=con.id
JOIN areas are ON opu.id=are.oportunidad_id
JOIN tipos_areas tare ON  are.tipoarea_id=tare.id


WHERE tema LIKE ?");

$stmt->execute(array($name));

$result = $stmt->fetchAll();

if ($result == false) {
    $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
}

require '../views/oportunidades/buscar_oportunidad.view.php';
