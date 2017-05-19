<?php
require 'conexion.php';

$fecha = $conexion->prepare('SELECT * FROM usuarios where fecha_alta= "2017-05-12" ');
$fecha->execute();

if ($fecha_enviada != "0000-00-00") {
    //las variable f_ son para trabajar fechas
    $f_caduca = strtotime("$fecha_enviada +90 days", $fecha_enviada);
    $f_caduca = date("Y-m-d", $f_caduca);
    $hoy      = date("Y-m-d");
    echo "<b>Fecha en la cual caduca:</b> " . $f_caduca . "<br>";
    echo "<b>Fecha de actual:</b> " . $hoy . "<br>";

    $f_hoy = strtotime($hoy);
    $f_hoy = floor($f_hoy / 86400);
    // Se divide entre 86400, ya que este es el número de segundos que posee un día
    $f_caduca1 = strtotime($f_caduca);
    $f_caduca1 = floor($f_caduca1 / 86400);
    //f_compara nos sirve para determinar cuantos días faltan para que se vuelva a habilitar el envió de correo a un determinado usuario
    $f_compara = ($f_caduca1 - $f_hoy);
    echo "<b>Dias que faltan para caducar:</b> " . $f_compara . "<br>";
    if ($f_compara <= 0) {
        //El valor de 1 nos indica que se debe actualizar la base de datos
        return true;
    } else {
        return false;
    }
} else {
    return false;
}
// Cierra la funcion fecha_caducidad

//Implementación
//Esta fecha es la fecha a la cual deseamos evaluarle su caducida
$fecha_registro = "2017-05-05";

echo "<b>Fecha ingresada:</b> " . $fecha_registro . "<br>";
if (caducidad($fecha_registro)) {
    //acá ira el código que quieres se ejecute en caso de caducar
    echo "<b>Estado:</b> Ya caduco";
} else {
    //acá ira el código que quieres se ejecute si no ha caducado
    echo "<b>Estado:</b> No ha caducado";
}

require '../views/fechaalta/fecha_alta.view.php';
