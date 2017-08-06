<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$query = $conexion->query("SELECT id,descripcion
FROM tipos_areas");

echo '<option value="">Elija Area</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['descripcion'] . '</option>' . "\n";

}
