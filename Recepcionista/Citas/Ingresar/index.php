<?php include '../../../login/validar_sesion.php';
verificarRol('recepcionista');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EnfSanar</title>
  <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

  <div class="menu-bar">

    <nav class="container">
      <div class="left-column">

        <div class="logo">
          <a href="../../../Recepcionista/index.php">
            <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
        </div>

        <ul>
          <li><a href="index.php" class="menu-principal">Citas</a></li>
          <li><a href="../../../Recepcionista/Pacientes/ingresar/index.php" class="menu-principal">Pacientes</a></li>
          <li><a href="../../../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="right-column container-form">

    <form action="modelo.php" method="post">

        <fieldset>

          <legend>Tipo de cita</legend>

          <input type="text" name="tipo" placeholder="Ingresar consulta o procedimiento"> <!-- no conectar -->

        </fieldset>

        <fieldset>

          <legend>Paciente</legend>

          <label>Nombre:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre del paciente"> <!-- no conectar -->

          <label>Apellido:</label>
          <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apelldio del paciente"> <!-- no conectar -->

          <label>Identificación:</label>
          <input type="number" id="id_paciente" name="id_paciente" placeholder="Ingresar numero de identidad del paciente">
        </fieldset>

        <fieldset>

          <legend>Fecha</legend>

          <label>Fecha solicitud:</label>
          <input type="date" id="fecha_solicitud" name="fecha_solicitud">

          <label>Fecha programada:</label>
          <input type="date" id="fecha_programada" name="fecha_programada">

          <label>Hora programada:</label>
          <input type="time" id="hora_programada" name="hora_programada">

        </fieldset>

  </div>

  <div class="menu-bar">

    <div class="buttom-end">
      <ul>
        <li><input type="submit" value="Guardar"></li>
        <li><a href="../Consultar/index.php" class="menu-principal">Consultar</a></li>
      </ul>
    </div>

  </div>

  </form>


</body>

</html>