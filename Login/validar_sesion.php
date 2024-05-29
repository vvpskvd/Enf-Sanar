<?php
session_start();

function verificarRol($rolPermitido) {
    if (!isset($_SESSION["usuario"])) {
        header("location:../login/login.php");
        exit;
    } elseif ($_SESSION["rol"] != $rolPermitido) {
        header("location:../login/login.php");
        exit;
    }
}
?>
