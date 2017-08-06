<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

require 'conexion.php';

$la_cuenta = $_POST['cuenta'];

$query = $conexion->query("SELECT * FROM contactos WHERE cuenta_id = $la_cuenta");
echo '<option value="">Elija Contacto</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ', ' . $row['apellido'] . '</option>' . "\n";

}
