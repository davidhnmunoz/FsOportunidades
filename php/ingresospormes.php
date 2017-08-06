
<?php
require 'conexion.php';

$año = $_POST['año'];

$queryenero = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=1 AND YEAR(opu.fecha_cierre)=$año");
$queryenero->bindValue(':año', $año);
$queryenero->execute();
$enero = $queryenero->fetch(PDO::FETCH_COLUMN);

$queryfebrero = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=2 AND YEAR(opu.fecha_cierre)=$año");
$queryfebrero->bindValue(':año', $año);
$queryfebrero->execute();
$febrero = $queryfebrero->fetch(PDO::FETCH_COLUMN);

$querymarzo = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=3 AND YEAR(opu.fecha_cierre)=$año");
$querymarzo->bindValue(':año', $año);
$querymarzo->execute();
$marzo = $querymarzo->fetch(PDO::FETCH_COLUMN);

$queryabril = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=4 AND YEAR(opu.fecha_cierre)=$año");
$queryabril->bindValue(':año', $año);
$queryabril->execute();
$abril = $queryabril->fetch(PDO::FETCH_COLUMN);

$querymayo = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=5 AND YEAR(opu.fecha_cierre)=$año");
$querymayo->bindValue(':año', $año);
$querymayo->execute();
$mayo = $querymayo->fetch(PDO::FETCH_COLUMN);

$queryjunio = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=6 AND YEAR(opu.fecha_cierre)=$año");
$queryjunio->bindValue(':año', $año);
$queryjunio->execute();
$junio = $queryjunio->fetch(PDO::FETCH_COLUMN);

$queryjulio = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=7 AND YEAR(opu.fecha_cierre)=$año");
$queryjulio->bindValue(':año', $año);
$queryjulio->execute();
$julio = $queryjulio->fetch(PDO::FETCH_COLUMN);

$queryagosto = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=8 AND YEAR(opu.fecha_cierre)=$año");
$queryagosto->bindValue(':año', $año);
$queryagosto->execute();
$agosto = $queryagosto->fetch(PDO::FETCH_COLUMN);

$queryseptiembre = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=9 AND YEAR(opu.fecha_cierre)=$año");
$queryseptiembre->bindValue(':año', $año);
$queryseptiembre->execute();
$septiembre = $queryseptiembre->fetch(PDO::FETCH_COLUMN);

$queryoctubre = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=10 AND YEAR(opu.fecha_cierre)=$año");
$queryoctubre->bindValue(':año', $año);
$queryoctubre->execute();
$octubre = $queryoctubre->fetch(PDO::FETCH_COLUMN);

$querynoviembre = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=11 AND YEAR(opu.fecha_cierre)=$año");
$querynoviembre->bindValue(':año', $año);
$querynoviembre->execute();
$noviembre = $querynoviembre->fetch(PDO::FETCH_COLUMN);

$querydiciembre = $conexion->prepare("SELECT SUM(opu.ingresos_reales) AS r FROM oportunidades opu WHERE MONTH(opu.fecha_cierre)=12 AND YEAR(opu.fecha_cierre)=$año");
$querydiciembre->bindValue(':año', $año);
$querydiciembre->execute();
$diciembre = $querydiciembre->fetch(PDO::FETCH_COLUMN);

$data = array(0 => ($enero),
    1               => ($febrero),
    2               => ($marzo),
    3               => ($abril),
    4               => ($mayo),
    5               => ($junio),
    6               => ($julio),
    7               => ($agosto),
    8               => ($septiembre),
    9               => ($octubre),
    10              => ($noviembre),
    11              => ($diciembre),
);
echo json_encode($data);
