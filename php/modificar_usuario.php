<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
$errorid = '';

//Saco los datos de la cuenta
if (isset($_GET['id'])) {

    $id  = $_GET["id"];
    $sql = $conexion->prepare("SELECT * FROM  usuarios WHERE id =:id");
    $sql->execute(array(':id' => $id));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

if (isset($_POST['modificar'])) {
    $idUsu      = $_POST['id'];
    $usuario    = $_POST['usuario'];
    $pass       = $_POST['pass'];
    $rol        = $_POST['rol'];
    $fecha_alta = $_POST['fecha_alta'];
    $fecha_baja = $_POST['fecha_baja'];

    /*update A Tabla usuario*/
    $sql       = "UPDATE usuarios SET usuario=:usuario , pass=:pass , fecha_alta=:fecha_alta,fecha_baja=:fecha_baja WHERE id=:idUsu";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array(
        ":idUsu"      => $idUsu,
        ":usuario"    => $usuario,
        ":pass"       => $pass,
        ":fecha_alta" => $fecha_alta,
        ":fecha_baja" => $fecha_baja));

    /*update A Tabla Roles*/
    $sql       = "UPDATE roles SET rol=:rol, usuario_id =:idUsu  WHERE usuario_id=:idUsu";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array(
        ":rol"     => $rol,
        ":usuario" => $usuario));

    header('location:index_usuarios.php?exito');

}
include '../views/usuarios/modificar_usuario.view.php';
