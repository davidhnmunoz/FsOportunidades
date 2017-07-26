<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if ($_REQUEST) {
    $username = $_REQUEST['username'];
    $usu_id   = $_SESSION['usu_id'];

    $updatecuit = $conexion->prepare("UPDATE usuarios SET  usuario=:username WHERE id=:usu_id");

    if ($updatecuit->execute(array(":usu_id" => $usu_id,
        ":username"                              => $username))) {

        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Usuario Disponible</div></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>El usuario Ya existe</div></div>';
    }

}
