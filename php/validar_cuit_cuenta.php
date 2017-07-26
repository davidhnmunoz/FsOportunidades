<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if ($_REQUEST) {
    $cuitcuenta = $_REQUEST['cuitcuenta'];

    $vid = $conexion->prepare('SELECT * FROM cuentas WHERE cuit = :cuitcuenta');
    $vid->execute(array(':cuitcuenta' => $cuitcuenta));
    $resultadoid = $vid->fetch();
    if ($resultadoid == true) // not available
    {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Cuit en uso</div></div>';
    } else {
        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Cuit OK</div></div>';
    }

}
