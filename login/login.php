<?php session_start();
if (isset($_SESSION['usuario'] )) {
	header('Location:../php/index.php');		
}
require "../php/conexion.php";

 $error='';
 $enviar='';
 $enviado ='';


 if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $usuario = $_POST['usuario'];
   $password = $_POST['password'];


   $sql = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
   $sql->execute( array(':usuario' => $usuario ,
   ':password'=> $password ));

   $resultado = $sql->fetch();
   if ($resultado !== false) {
         $_SESSION['usuario'] = $usuario;
		$enviar .=  '<center> Bienvenido '. ucwords($resultado['usuario']). '</center> <br>';
		$enviar .= '<meta http-equiv="refresh" content="2;url=index.php">';
		$enviado .= '<center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><br>
                  <span class="">Cargando</span></center><br>';
   
   } else {
   $error .= '<li> Los Datos ingresados son Incorrecto </li>';
   
}
 } 


require 'views/login.view.php';
 ?>