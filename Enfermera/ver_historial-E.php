<?php include '../Enfermera/validar_sesion.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>EnfSanar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Enfermera/css_ver_h.css">
</head>
<body>
<!--Menu-->
    <div class="menu-bar" >
    <div class="logo"><a href="../Enfermera/home_enf.php"><img src="LogoImageWEB.png" alt="Image" style="width: 50px; height: 50px;"></a></div>
    <a class="tittle"><h2>EnfSanar</h2></a>
    <a href="../login/logout.php" class="menu-item">Cerrar cesión</a>
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
   <!-- Solicitud de historial -->

  <h3>Consulta de Historial Clinico</h3>
  <form>
    <fieldset>
      <legend>Cedula de Identidad del Paciente</legend>

      <label>Cedula de Identidad</label>
      <input type="text" name="identificacion" placeholder="Ingresar cedula de identidad del paciente">

    </fieldset>   
    <button class="button">Consultar</button>
  </form>
  
</div>
</body>
</html>