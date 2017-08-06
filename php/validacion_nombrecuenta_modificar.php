<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

sleep(1);
require 'conexion.php';

if ($_REQUEST) {
    $nombrecuenta = $_REQUEST['nombrecuenta'];
    $cuenta_id    = $_SESSION['cuenta_id'];

    $updateempresa = $conexion->prepare("UPDATE  cuentas SET nombreempresa=:nombrecuenta WHERE id=:cuenta_id ");

    if ($updateempresa->execute(array(":cuenta_id" => $cuenta_id,
        ":nombrecuenta"                                => $nombrecuenta))) {

        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Nombre De Cuenta Disponible</div></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Nombre de Cuenta En uso</div></div>';
    }

}
