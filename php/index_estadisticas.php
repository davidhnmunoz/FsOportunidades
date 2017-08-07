<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

require '../views/estadisticas/index_estadisticas.view.php';
