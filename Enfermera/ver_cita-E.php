<?php include '../Enfermera/validar_sesion.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>EnfSanar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Enfermera/css_formulario.css">
</head>
<body>
<!--Menu-->
    <div class="menu-bar" >
    <div class="logo"><a href="../Enfermera/home_enf.php"><img src="LogoImageWEB.png" alt="Image" style="width: 50px; height: 50px;"></a></div>
    <a class="tittle"><h2>EnfSanar</h2></a>
    <a href="../login/logout.php" class="menu-item">Cerrar Sesión</a>
    </div>
<p class="usuario">Bienvenido</p> <!--Colocar el usuario-->

<br><br>
    <div class="container">
        <div class="left-column">     <!--columna izquierda-Menu-->
            <ul>
              <li><a href="../Enfermera/Formulario_clinico-E.php" class="menu-principal">Crear Historial</a></li>
              <li><a href="../Enfermera/ver_historial-E.php" class="menu-principal">Ver Historial Clínico</a></li>
              <li><a href="../Enfermera/ver_cita-E.php" class="menu-principal">Citas Pendientes</a></li>
            </ul>
        </div>

<div class="right-column">                    <!--columna derecha-->
   <!-- Citas pendientes -->

  <form>
    <fieldset>
      <legend>Citas pendientes</legend>

      
    </fieldset>   
    <button class="button">actualizar</button>
    <button Class="button">modificar</button>
  </form>
  
</div>
</body>
</html>