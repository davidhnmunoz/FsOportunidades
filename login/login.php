<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location:../php/index.php');
}
require "../php/conexion.php";
$error      = '';
$enviar     = '';
$enviado    = '';
$errorfecha = '';

//NUMERO DE INTENTOS PERMITIDOS
$permitidos = 2;

/* Lo que envia el usuario por teclado Login*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario  = $_POST['usuario'];
    $password = $_POST['password'];
    $sql      = $conexion->prepare('SELECT id,usuario,pass,fecha_alta FROM usuarios  WHERE usuario = :usuario AND pass= :password');
    $sql->execute(array(
        ':usuario'  => $usuario,
        ':password' => $password));
    $resultado = $sql->fetch();
/*Sacar el password*/
    $consultafecha = $conexion->prepare('SELECT SELECT * FROM usuarios u
WHERE u.fecha_alta >= CURDATE() + INTERVAL 90 DAY  ');
    if (!isset($_SESSION['intentos'])) {
        $intento              = 0;
        $_SESSION['intentos'] = $intento;
    } else {
        $intento = $_SESSION['intentos'];
    }
    // LUEGO COMPARAMOS CON EL NUMERO DE INTENTOS PERMITIDOS
    if ($intento >= $permitidos) {
        // LO QUE PASARA SI HA SOBREPASADO EL NUMERO DE INTENTOS VALIDOS
        unset($_SESSION['intentos']);
        header('location:robot.php');
    } else {
        // cuenta los INTENTO
        $intento++;

        if ($resultado !== false) {
            // BORRAMOS LAS VARIABLES DE SESION
            unset($_SESSION['tiempo_fuera'], $_SESSION['intentos']);
            // AQUI REDIRIGES O LO QUE SEA Q HAYA Q HACER SI EL LOGIN ES CORECTO
            $_SESSION['usuario'] = $usuario;
            $enviar .= '<center> Bienvenido ' . ucwords($resultado['usuario']) . '</center> <br>';
            $enviar .= '<meta http-equiv="refresh" content="2;url=index.php">';
            $enviado .= '<br><center><i class="fa fa-sun-o fa-spin fa-3x fa-fw"></i><br><br>
                  <span class="">Cargando</span></center><br>';
        } else {
            $_SESSION['intentos'] = $intento;
            $error .= '<li>Datos incorrectos, vas: ' . $intento . ' intento/s de (3)</li>';

        }
    }
}
require 'views/login.view.php';
