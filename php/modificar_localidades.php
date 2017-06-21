<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

require 'conexion.php';
$el_departamento = $_POST['departamento'];

$query = $conexion->query("SELECT * FROM localidades WHERE departamento_id = $el_departamento ");

echo '<option value="0">Elija Localidad</option>';

foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>' . "\n";
}
