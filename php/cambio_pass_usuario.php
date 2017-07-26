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

    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
        $idUsu     = $_POST['id'];
        $pass      = $_POST['password'];
        $alta_pass = $_POST['alta_pass'];

        /*Consulta Contraseña disponibles*/
        $consultapass = $conexion->prepare("SELECT usu_h.pass FROM usuarios_historias usu_h
            WHERE usu_h.usuario_id = $idUsu
          ORDER BY usu_h.id DESC LIMIT 3");

        $consultapass->execute();
        $res = $consultapass->fetchAll(PDO::FETCH_ASSOC);

// var_dump($res);
        $a = $res[0];
        $b = $res[1];
        $c = $res[2];

        foreach ($a as $keya) {
            // var_dump($keya);
            if ($pass == $keya) {

                $respuesta = 'repetida';
            }
        }
        foreach ($b as $keyb) {

            if ($pass == $keyb) {

                $respuesta = 'repetida';
            }
        }

        foreach ($c as $keyc) {
            if ($pass == $keyc) {

                $respuesta = 'repetida';
            }
        }
        if ($respuesta == 'repetida') {
            header('location:../views/usuarios/pass_repe_sesion_admin.php');
            // var_dump($respuesta);
        } else {
            /*update A Tabla usuario*/
            $sql       = "UPDATE usuarios SET  pass=:pass,alta_pass=:alta_pass  WHERE id=:idUsu";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(
                ":idUsu"     => $idUsu,
                ":pass"      => $pass,
                ":alta_pass" => $alta_pass));

            /*Insert A tabla usuario_historias */
            $sql1 = $conexion->prepare('INSERT INTO usuarios_historias (pass,usuario_id )

            VALUES (:pass ,:idUsu  )');

            $sql1->execute(array(
                ':pass'  => $pass,
                ':idUsu' => $idUsu));

            header('location:index_usuarios.php?exitocontra');
        }

    }

    /*update A Tabla usuario*/

}
require '../views/usuarios/cambio_pass_usuario.view.php';
