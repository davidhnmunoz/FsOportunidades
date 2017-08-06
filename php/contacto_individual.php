<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
$id = $_GET['id'];

$contactos = $conexion->prepare("SELECT con.id,con.cuenta_id,cue.nombreempresa,con.usuario_id,usu.usuario,emp.nombre
 as 'nemp',emp.apellido as 'aemp',con.nombre,con.apellido,con.email,con.telefono



FROM
contactos con
JOIN cuentas cue ON con.cuenta_id=cue.id
JOIN  usuarios usu ON con.usuario_id=usu.id
JOIN empleados emp ON usu.id=emp.usuario_id




WHERE con.id=$id");
$rcontactos = $contactos->execute();
$rcontactos = $contactos->fetchAll(PDO::FETCH_OBJ);

require '../views/contactos/contacto_individual.view.php';
