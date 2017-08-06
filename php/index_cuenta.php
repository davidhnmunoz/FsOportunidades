<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$cuentas = $conexion->prepare('SELECT cue.id as "id",cue.nombreempresa ,cue.telefono,cue.sitioweb,cue.cuit


FROM cuentas cue



WHERE cue.id=cue.id and estado=1  GROUP BY cue.id  ORDER BY nombreempresa ASC');
$cuentas->execute();
$rcuentas = $cuentas->fetchAll(PDO::FETCH_OBJ);

require '../views/cuentas/index_cuenta.view.php';
