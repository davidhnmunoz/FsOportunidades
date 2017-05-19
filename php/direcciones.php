<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$provincias = $conexion->prepare('SELECT * FROM provincias ');
$provincias->execute();
require '../views/direcciones/direcciones.view.php';
