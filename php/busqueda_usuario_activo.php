<?php
require "conexion.php";

$sinresultado = '';

$name = "%" . $_GET["txtName"] . "%";
$stmt = $conexion->prepare("SELECT usu.id,usu.usuario,usu.fecha_alta,trol.Descripcion AS 'rol'

 FROM usuarios usu
 JOIN roles rol ON usu.id=rol.usuario_id
 JOIN tipos_roles trol ON rol.tiposroles_id=trol.id

WHERE  estado=1 AND usuario LIKE ? GROUP BY usu.id  ORDER BY usu.usuario ASC  ");

$stmt->execute(array($name));

$result = $stmt->fetchAll();

if ($result == false) {
    $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
}

require '../views/usuarios/buscar_usuario.view.php';
