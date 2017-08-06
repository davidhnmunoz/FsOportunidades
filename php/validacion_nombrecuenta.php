<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

sleep(1);
require 'conexion.php';

if ($_REQUEST) {
    $nombrecuenta = $_REQUEST['nombrecuenta'];

    $vncuenta = $conexion->prepare("SELECT * FROM cuentas WHERE nombreempresa = :nombrecuenta");
    $vncuenta->execute(array(':nombrecuenta' => $nombrecuenta));
    $resultadoncuenta = $vncuenta->fetch();
    if ($resultadoncuenta == true) // not available
    {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>La cuenta Ya existe</div></div>';
    } else {
        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>Cuenta Disponible</div></div>';
    }

}
