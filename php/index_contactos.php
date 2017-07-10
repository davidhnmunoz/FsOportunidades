<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$contactos = $conexion->prepare("SELECT con.id as 'id' ,con.nombre,con.apellido,con.email,con.telefono



FROM
contactos con

WHERE con.id=con.id and estado=1 GROUP BY con.id  ORDER BY con.nombre ASC");
$rcontactos = $contactos->execute();
$rcontactos = $contactos->fetchAll(PDO::FETCH_OBJ);

require '../views/contactos/index_contactos.view.php';
