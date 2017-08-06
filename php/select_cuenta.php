<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

$query = $conexion->query("SELECT * FROM cuentas");

echo '<option value="">Elija cuenta</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombreempresa'] . '</option>' . "\n";
}
