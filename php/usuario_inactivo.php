<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$usuarios = $conexion->prepare("SELECT usu.id,usu.usuario,usu.fecha_alta,trol.Descripcion AS 'rol',usu.fecha_baja

 FROM usuarios usu
 JOIN roles rol ON usu.id=rol.usuario_id
 JOIN tipos_roles trol ON rol.tiposroles_id=trol.id
WHERE usu.id=usu.id and estado=0 GROUP BY usu.id  ORDER BY usu.usuario ASC");
$rusuarios = $usuarios->execute();
$rusuarios = $usuarios->fetchAll(PDO::FETCH_OBJ);

require '../views/usuarios/usuario_inactivo.view.php';
