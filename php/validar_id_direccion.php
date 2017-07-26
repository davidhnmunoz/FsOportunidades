<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if ($_REQUEST) {
    $direccion_id = $_REQUEST['direccion_id'];

    $vid = $conexion->prepare('SELECT * FROM direcciones WHERE id = :direccion_id');
    $vid->execute(array(':direccion_id' => $direccion_id));
    $resultadoid = $vid->fetch();
    if ($resultadoid == true) // not available
    {
        echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>ID en uso</div></div>';
    } else {
        echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>ID OK</div></div>';
    }

}
