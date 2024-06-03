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

verificarRol('recepcionista');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Recepcionista</title>
    <link rel="icon" href="../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="index.php">
                    <img src="../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

            <ul class="menu-principal">
                <li><a href="../Recepcionista/Citas/ingresar/index.php">Citas</a></li>
                <li><a href="../Recepcionista/Pacientes/ingresar/index.php">Pacientes</a></li>
                <li><a href="../login/logout.php">Cerrar Sesión</a></li>
            </ul>

        </div>
        
    </nav>
        

    <div class="image-wrapper">
        <img src="../img/LogoImage.png" alt="Image">
    </div>

</body>

</html>