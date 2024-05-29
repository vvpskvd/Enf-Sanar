<?php include '../login/validar_sesion.php';
verificarRol('recepcionista');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnfSanar</title>
    <link rel="icon" href="../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <div class="menu-bar">

        <nav class="container">
            <div class="left-column">

                <div class="logo">
                    <a href="index.php">
                        <img src="../Img/LogoImageWEB.png" alt="Image"></a>
                </div>

                <ul>
                    <li><a href="../Recepcionista/Citas/ingresar/index.php" class="menu-principal">Citas</a></li>
                    <li><a href="../Recepcionista/Pacientes/ingresar/index.php" class="menu-principal">Pacientes</a></li>
                    <li><a href="../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="image-wrapper">
        <img src="../img/LogoImage.png" alt="Image" class="logo-body">
    </div>

</body>

</html>