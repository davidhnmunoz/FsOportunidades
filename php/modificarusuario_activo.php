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

    $_SESSION['usu_id'] = $id;

}

if (isset($_POST['modificar'])) {

    $idUsu      = $_POST['id'];
    $usuario    = $_POST['usuario'];
    $rol        = $_POST['rol'];
    $fecha_alta = $_POST['fecha_alta'];

    $sql       = "UPDATE usuarios SET usuario=:usuario , fecha_alta=:fecha_alta WHERE id=:idUsu";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array(
        ":idUsu"      => $idUsu,
        ":usuario"    => $usuario,

        ":fecha_alta" => $fecha_alta));

    /*update A Tabla Roles*/
    $sql2       = "UPDATE roles SET tiposroles_id=:rol, usuario_id =:idUsu  WHERE usuario_id=:idUsu";
    $resultado2 = $conexion->prepare($sql2);
    $resultado2->execute(array(
        ":rol"   => $rol,
        ":idUsu" => $idUsu));

    header('location:index_usuarios.php?exito');
}

include '../views/usuarios/modificarusuario_activo.view.php';
