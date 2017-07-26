<?php
session_start();
if (isset($_SESSION['usuario'])) {

    header('location:php/index.php');
} else {
    header('location:login/login.php');
}
