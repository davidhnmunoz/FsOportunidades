<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
if (isset($_GET['id'])) {

    $id  = $_GET["id"];
    $sql = $conexion->prepare("SELECT con.id,con.usuario_id,con.nombre,con.apellido,con.email,con.telefono, con.cuenta_id,cue.nombreempresa
FROM  contactos con
JOIN cuentas cue ON con.cuenta_id=cue.id

 WHERE con.id =:id");
    $sql->execute(array(':id' => $id));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

if (isset($_POST['modificar'])) {

    $usuario_id = $_SESSION['idusuario'];

    $idUsu     = $_POST["id"];
    $cuenta_id = $_POST['cuenta_id'];

    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email    = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql       = "UPDATE contactos SET cuenta_id=:cuenta_id , usuario_id=:usuario_id ,nombre=:nombre, apellido=:apellido,email=:email,telefono=:telefono  WHERE id=:idUsu";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array(
        ":idUsu"      => $idUsu,
        ":cuenta_id"  => $cuenta_id,
        ":usuario_id" => $usuario_id,
        ":nombre"     => $nombre,
        ":apellido"   => $apellido,
        ":email"      => $email,
        ":telefono"   => $telefono));

    header('location:index_contactos.php?exito');

}

require '../views/contactos/modificar_contacto.view.php';
