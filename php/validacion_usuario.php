<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

sleep(1);
require 'conexion.php';

if ($_REQUEST) {
    $username = $_REQUEST['username'];

    $vusu = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :username");
    $vusu->execute(array(':username' => $username));
    $resultadousu = $vusu->fetch();
    if ($resultadousu == true) // not available
    {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Este Usuario ya Existe</div></div>';
    } else {
        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Usuario Disponible</div></div>';
    }

}
