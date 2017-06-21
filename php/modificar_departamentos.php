<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

require 'conexion.php';

$la_provincia = $_POST['provincia'];

$query = $conexion->query("SELECT * FROM departamentos WHERE provincia_id = $la_provincia");
echo '<option value="0">Elija Departamento</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>' . "\n";
}
