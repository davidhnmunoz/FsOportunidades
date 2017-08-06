<?php
require 'conexion.php';

$año = $_POST['año'];

$consultaingresos = $conexion->prepare("SELECT SUM(opu.ingresos_reales) as 'r',cue.nombreempresa

FROM oportunidades opu JOIN
cuentas cue ON opu.cuenta_id=cue.id


WHERE  YEAR(opu.fecha_alta)=$año GROUP BY opu.cuenta_id  ORDER by r desc limit 5");

$consultaingresos->execute();
$ingresos = $consultaingresos->fetchAll(PDO::FETCH_COLUMN);

$consultacuenta = $conexion->prepare("SELECT cue.nombreempresa,SUM(opu.ingresos_reales) as 'r'

FROM oportunidades opu JOIN
cuentas cue ON opu.cuenta_id=cue.id


WHERE  YEAR(opu.fecha_alta)=2017 GROUP BY opu.cuenta_id  ORDER by r desc limit 5");

$consultacuenta->execute();
$cuenta = $consultacuenta->fetchAll(PDO::FETCH_COLUMN);

$a = $ingresos[0];
$b = $ingresos[1];
$c = $ingresos[2];
$d = $ingresos[3];
$e = $ingresos[4];

$f = $cuenta[0];
$g = $cuenta[1];
$h = $cuenta[2];
$i = $cuenta[3];
$j = $cuenta[4];

$data = array(0 => ($a),

    1               => ($b),
    2               => ($c),
    3               => ($d),
    4               => ($e),
    5               => ($f),
    6               => ($f),
    7               => ($g),
    8               => ($h),
    9               => ($i),
    10              => ($j),

);

echo json_encode($data);
