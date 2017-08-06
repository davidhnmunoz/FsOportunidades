<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

require 'conexion.php';

$el_area = $_POST['area'];

$query = $conexion->query("SELECT test.id,test.descripcion



FROM estados est
JOIN tipos_areas tare ON est.tipos_areas_id=tare.id
JOIN tipos_estado test ON est.tipos_estado_id=test.id


WHERE est.tipos_areas_id=$el_area");
echo '<option value="">Elija Estado</option>';
foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['descripcion'] . '</option>' . "\n";

}
