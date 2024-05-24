<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:../login/login.php");
    exit;
} elseif ($_SESSION["rol"] != "enfermera") {
    header("location:../login/login.php");
    exit;
}
?>