<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}

require 'conexion.php';

$query = $conexion->query("SELECT * FROM provincias");

$queryselected = $conexion->prepare("SELECT dir.id as 'dirid' ,prov.id as 'id', prov.nombre as 'nombre'

FROM provincias prov JOIN
direcciones dir ON dir.provincia_id=prov.id JOIN
cuentas cue ON cue.direccion_id=dir.id
WHERE   cue.id= $id");
$queryselected->execute();
$rqueryselected = $queryselected->fetchAll(PDO::FETCH_OBJ);

$nuevaprovincia = $conexion->prepare("SELECT prov.id as 'provid', prov.nombre as 'provnombre'

FROM provincias prov ");
$nuevaprovincia->execute();
$rnuevaprovincia = $nuevaprovincia->fetchAll(PDO::FETCH_OBJ);

foreach ($rqueryselected as $queryselected) {
    echo "<option selected='selected' value='" . $queryselected->id . "'>" . $rqueryselected->nombre . "</option>" . "\n";

}

echo '<option value="0">Elija Provincia</option>';

foreach ($query as $row) {
    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>' . "\n";
}
