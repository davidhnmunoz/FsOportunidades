<?php session_start();
if(!isset($_SESSION['usuario'])){
header('location:../login/login.php');
}
require 'conexion.php';


	$oportunidades = $conexion->prepare('SELECT * FROM oportunidades Where estado = 1');
	$oportunidades->execute();

	
	require '../views/index.view.php';

?>