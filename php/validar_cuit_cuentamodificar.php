<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if ($_REQUEST) {
    $cuitcuenta = $_REQUEST['cuitcuenta'];

    $cuenta_id  = $_SESSION['cuenta_id'];
    $updatecuit = $conexion->prepare("UPDATE cuentas SET  cuit=:cuitcuenta WHERE id=:cuenta_id");

    if ($updatecuit->execute(array(":cuenta_id" => $cuenta_id,
        ":cuitcuenta"                               => $cuitcuenta))) {

        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Cuit Disponible</div></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Cuit En uso</div></div>';
    }

}
