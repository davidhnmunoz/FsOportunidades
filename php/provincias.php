<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$query = $conexion->query("SELECT * FROM provincias");

echo '<option value="0">Elija Provincia</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>' . "\n";
}
