<?php include '../../../recepcionista/validar_sesion.php';
verificarRol('recepcionista');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar Pacientes</title>
  <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

  <nav class="container">

  <div class="box-menu">

      <div class="logo">
          <a href="../../../Recepcionista/index.php">
              <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
      </div>

      <ul class="menu-principal">
          <li><a href="../../../Recepcionista/Citas/Ingresar/index.php">Citas</a></li>
          <li><a href="index.php">Pacientes</a></li>
          <li><a href="../../../login/logout.php">Cerrar Sesión</a></li>
      </ul>

  </div>

  </nav>

  <div class="container-form">

    <form action="modelo.php" method="post">

      <div class= "div-form">

          <fieldset>
            <legend>Paciente</legend>

            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre">

            <label>Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apelldio">

            <label for="tipo_documento">Tipo de documento:</label>
            <select id="tipo_documento" name="tipo_documento"> 
              <option value="Cédula de ciudadania">Cédula de ciudadania</option>
              <option value="Tarjeta de identidad">Tarjeta de identidad</option>
              <option value="Cédula de extranjería">Cédula de extranjería</option>
            </select>

            <label>Identificación:</label>
            <input type="number" id="identificacion" name="identificacion" placeholder="Ingresar numero de identidad">

            <label>Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ingresar el telefono">

            <label>Ocupación:</label>
            <input type="text" id="ocupacion" name="ocupacion" placeholder="Ingresar la ocupación">

            <label>Entidad:</label>
            <input type="text" id="entidad" name="entidad" placeholder="Ingresar la entidad">

            <label>Estado civil:</label>
            <input type="text" id="estado_civil" name="estado_civil" placeholder="Ingresar el estado civil">
          </fieldset>
      </div>

      <div class="div-form">
          <fieldset>
            <legend>Otros Datos</legend>

            <label>Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Ingresar la direccion">

            <label>Barrio:</label>
            <input type="text" id="barrio" name="barrio" placeholder="Ingresar el barrio">

            <label>Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingresar fecha de nacimiento ">

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo"> 
              <option value="femenino">Femenino</option>
              <option value="masculino">Masculino</option>
            </select>

            <label for="tipo_sangre">Tipo de sangre:</label>
            <select id="tipo_sangre" name="tipo_sangre">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>

            <label>Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Ingresar el correo electrónico">

          </fieldset>
      </div> 

  </div>

      <div class="buttom-end">

          <ul>
            <li><input type="submit" value="Guardar"></li>
            <li><a href="../Consultar/index.php" class="menu-principal" target="_blank">Consultar</a></li>
          </ul>

      </div>

    </form>

</body>

</html>