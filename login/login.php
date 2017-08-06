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

    // Validar que el usuario no ingrese campos en blanco
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {

        $usuario  = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = $conexion->prepare('SELECT usuario,pass FROM usuarios  WHERE usuario = :usuario AND pass= :password');
        $sql->execute(array(

            ':usuario'  => $usuario,
            ':password' => $password));
        $resultado = $sql->fetch();

/*Saco ID de usuario*/

        $consultaid = $conexion->prepare('SELECT id FROM usuarios  WHERE usuario = :usuario');
        $consultaid->bindValue(':usuario', $usuario);
        $consultaid->execute();
        $id = $consultaid->fetch(PDO::FETCH_COLUMN);
        // var_dump($id);

/*saco La fecha De alta*/
        $consultapass = $conexion->prepare('SELECT alta_pass FROM usuarios  WHERE id = :id');
        $consultapass->bindValue(':id', $id);
        $consultapass->execute();
        $alta_pass = $consultapass->fetch(PDO::FETCH_COLUMN);
        // var_dump($alta_pass);

        /*Saco el Rol del usuario*/
        $consultarol = $conexion->prepare('SELECT rol.tiposroles_id    FROM roles rol JOIN    usuarios usu
        ON rol.usuario_id=usu.id
          WHERE usu.id=:id');
        $consultarol->bindValue(':id', $id);
        $consultarol->execute();
        $rol = $consultarol->fetch(PDO::FETCH_COLUMN);
        // var_dump($rol);

/*Intentos*/
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

                // Se redirige al index en el caso de que el usuario sea correcto
                $_SESSION['idusuario'] = $id;
                $_SESSION['usuario']   = $usuario;
                $_SESSION['password']  = $password;
                $_SESSION['rol']       = $rol;
                $_SESSION['alta_pass'] = $alta_pass;

                // var_dump($_SESSION['idusuario']);
                // var_dump($_SESSION['usuario']);
                // var_dump($_SESSION['rol']);
                // var_dump($_SESSION['alta_pass']);

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
}

require 'views/login.view.php';
