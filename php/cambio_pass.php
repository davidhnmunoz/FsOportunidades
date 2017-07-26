<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if (isset($_POST['cambiar'])) {

    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
        $id        = $_POST['id'];
        $pass      = $_POST['password'];
        $alta_pass = $_POST['alta_pass'];
// var_dump($id );
        // var_dump($pass );
        // var_dump($alta_pass );

        /*Consulta Contraseña disponibles*/
        $consultapass = $conexion->prepare("SELECT usu_h.pass FROM usuarios_historias usu_h
            WHERE usu_h.usuario_id = $id
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
            header('location:../views/usuarios/pass_repe.php');
            // var_dump($respuesta);
        } else {
            /*update A Tabla usuario*/
            $sql       = "UPDATE usuarios SET  pass=:pass ,alta_pass=:alta_pass WHERE id=:id";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(
                ":id"        => $id,
                ":pass"      => $pass,
                ":alta_pass" => $alta_pass));

            /*Insert A tabla usuario_historias */
            $sql1 = $conexion->prepare('INSERT INTO usuarios_historias (pass,usuario_id )

            VALUES (:pass ,:id  )');

            $sql1->execute(array(
                ':pass' => $pass,
                ':id'   => $id));

            header('location:../php/index.php?exitocontra');
        }

    }

}

require '../views/usuarios/cambio_pass.view.php';
