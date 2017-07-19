<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$cuentasin = $conexion->prepare('SELECT cue.id as "id",cue.nombreempresa,cue.cuit ,cue.telefono,cue.sitioweb
,cue.direccion_id

FROM cuentas cue

WHERE cue.id=cue.id and estado=0  GROUP BY cue.id  ORDER BY nombreempresa ASC');
$rcuentasin = $cuentasin->execute();
$rcuentasin = $cuentasin->fetchAll(PDO::FETCH_OBJ);
require '../views/cuentas/cuentas_inactivas.view.php';
