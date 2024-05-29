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
          <li><a href="../../../Recepcionista/Citas/ingresar/index.php" class="menu-principal">Citas</a></li>
          <li><a href="index.php" class="menu-principal">Pacientes</a></li>
          <li><a href="../../../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="right-column container-form">

    <form action="modelo.php" method="post">

      <div>

          <fieldset>
            <legend>Paciente</legend>

            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre">

            <label>Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apelldio">

            <label>Tipo de documento:</label>
            <input type="text" id="tipo_documento" name="tipo_documento" placeholder="Ingresar el tipo de docoumento">

            <label>Identificación:</label>
            <input type="number" id="identificacion" name="identificacion" placeholder="Ingresar numero de identidad">

            <label>Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ingresar el telefono">

            <label>Nacionalidad:</label>
            <input type="text" id="nacionalidad" name="nacionalidad" placeholder="Ingresar la nacionalidad">

            <label>Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Ingresar la direccion">

            <label>Barrio:</label>
            <input type="text" id="barrio" name="barrio" placeholder="Ingresar el barrio">

            <label>Municipio:</label>
            <input type="text" id="municipio" name="municipio" placeholder="Ingresar el municipio">

            <label>Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingresar fecha de nacimiento ">

            <label>Sexo:</label>
            <input type="text" id="sexo" name="sexo" placeholder="Ingresar el sexo">

            <label>Tipo de sangre:</label>
            <input type="text" id="tipo_sangre" name="tipo_sangre" placeholder="Ingresar el tipo de sangre">

            <label>Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Ingresar el correo electrónico">

            <label>Ocupación:</label>
            <input type="text" id="ocupacion" name="ocupacion" placeholder="Ingresar la ocupación">

            <label>Entidad:</label>
            <input type="text" id="entidad" name="entidad" placeholder="Ingresar la entidad">

            <label>Estado civil:</label>
            <input type="text" id="estado_civil" name="estado_civil" placeholder="Ingresar el estado civil">

            <label>Comorbilidades:</label>
            <input type="text" id="comorbilidades" name="comorbilidades" placeholder="Ingresar las comorbilidades">
          </fieldset>
          
  </div>

      </div>

      <div class="menu-bar">

        <div class="buttom-end">
          <ul>
            <li><input type="submit" value="Guardar"></li>
            <li><a href="../Consultar/index.php" class="menu-principal">Consultar</a></li>
            <li><a href="../Editar/index.php" class="menu-principal">Editar</a></li>
          </ul>
        </div>

      </div>

    </form>

</body>

</html>