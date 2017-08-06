<?php
require 'conexion.php';

$año = $_POST['año'];

$queryganadas = $conexion->prepare("SELECT count(esto.tipos_estado_id) AS r FROM estado_oportunidades esto JOIN oportunidades opu ON
esto.oportunidad_id=opu.id



WHERE esto.tipos_estado_id=3 AND YEAR(opu.fecha_alta)=$año");
$queryganadas->bindValue(':año', $año);
$queryganadas->execute();
$ganadas = $queryganadas->fetch(PDO::FETCH_COLUMN);

$queryenproceso = $conexion->prepare("SELECT count(esto.tipos_estado_id) AS r FROM estado_oportunidades esto JOIN oportunidades opu ON
esto.oportunidad_id=opu.id



WHERE esto.tipos_estado_id=2 AND YEAR(opu.fecha_alta)=$año");
$queryenproceso->bindValue(':año', $año);
$queryenproceso->execute();
$enproceso = $queryenproceso->fetch(PDO::FETCH_COLUMN);

$queryperdidas = $conexion->prepare("SELECT count(esto.tipos_estado_id) AS r FROM estado_oportunidades esto JOIN oportunidades opu ON
esto.oportunidad_id=opu.id



WHERE esto.tipos_estado_id=1 AND YEAR(opu.fecha_alta)=$año");
$queryperdidas->bindValue(':año', $año);
$queryperdidas->execute();
$perdidas = $queryperdidas->fetch(PDO::FETCH_COLUMN);

$data = array(0 => ($ganadas),
    1               => ($enproceso),
    2               => ($perdidas),

);

echo json_encode($data);
