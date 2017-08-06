
<?php
require 'conexion.php';

$año             = 2017;
$consultaingresos = $conexion->prepare("SELECT SUM(opu.ingresos_reales) as 'r'

FROM oportunidades opu JOIN
usuarios usu ON opu.usuario_id=usu.id


WHERE  YEAR(opu.fecha_alta)=$año  GROUP BY opu.usuario_id ORDER by r desc");

$consultaingresos->execute();
$ingresos = $consultaingresos->fetchAll(PDO::FETCH_COLUMN);

$consultausuario = $conexion->prepare("SELECT usu.usuario, SUM(opu.ingresos_reales) as 'r'

FROM oportunidades opu JOIN
usuarios usu ON opu.usuario_id=usu.id


WHERE  YEAR(opu.fecha_alta)=$año  GROUP BY opu.usuario_id ORDER by r desc");

$consultausuario->execute();
$usuario = $consultausuario->fetchAll(PDO::FETCH_COLUMN);

$a = $ingresos[0];
$b = $ingresos[1];
$c = $ingresos[2];
$d = $ingresos[3];
$e = $ingresos[4];
$f = $ingresos[5];

$g = $usuario[0];
$h = $usuario[1];
$i = $usuario[2];
$j = $usuario[3];
$k = $usuario[4];
$l = $usuario[5];

$data = array(0 => ($a),
    1               => ($b),
    2               => ($c),
    3               => ($d),
    4               => ($e),
    5               => ($f),
    6               => ($g),
    7               => ($h),
    8               => ($i),
    9               => ($j),
    10              => ($k),
    11              => ($l),

);

echo json_encode($data);
