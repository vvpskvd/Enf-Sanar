<?php include '../Enfermera/validar_sesion.php' ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnfSanar</title>
    <link rel="stylesheet" type="text/css" href="../Enfermera/css_inicio.css">
</head>
<body>
<!-- Menu -->
<div class="menu-bar">
    <div class="logo">
        <a href="../Enfermera/home_enf.php"><img src="LogoImageWEB.png" alt="Image" style="width: 50px; height: 50px;"></a>
    </div>
    <a class="tittle"><h2>EnfSanar</h2></a>
    <a href="../login/logout.php" class="menu-item">Cerrar Sesión</a>
</div>
<p class="usuario">Bienvenido <?php echo $_SESSION["usuario"]; ?></p>

<br><br>
<div class="container">
    <div class="left-column"> <!-- columna izquierda-Menu -->
        <ul>
            <li><a href="../Enfermera/Formulario_clinico-E.php" class="menu-principal">Crear Historial</a></li>
            <li><a href="../Enfermera/ver_historial-E.php" class="menu-principal">Ver Historial Clínico</a></li>
            <li><a href="../Enfermera/ver_cita-E.php" class="menu-principal">Citas Pendientes</a></li>
        </ul>
    </div>

    <div class="right-column"> <!-- columna derecha -->
        <!-- Portada -->
        <img src="LogoImage.png" alt="Image" style="width: 450px; height: 350px; margin: auto; display: block;">
    </div>
</div>
</body>
</html>
