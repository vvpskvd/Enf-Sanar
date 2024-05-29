<?php include '../login/validar_sesion.php';
verificarRol('enfermera');
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
                    <li><a href="../Enfermera/F_Consulta/ingresar/index.php" class="menu-principal">Consulta</a></li>
                    <li><a href="../Enfermera/F_Procedimiento/ingresar/index.php" class="menu-principal">Procedimiento</a></li>
                    <li><a href="../Enfermera/Ver_Citas/index.php" class="menu-principal">Ver Citas</a></li>
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