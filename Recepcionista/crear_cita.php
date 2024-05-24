<?php include '../Recepcionista/validar_sesion.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>EnfSanar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Recepcionista/css_crear.css">
</head>
<body>
<!--Menu-->
    <div class="menu-bar" >
    <div class="logo"><a href="../Recepcionista/home_recep.php"><img src="LogoImageWEB.png" alt="Image" style="width: 50px; height: 50px;"></a></div>
    <a class="tittle"><h2>EnfSanar</h2></a>
    <a href="../login/logout.php" class="menu-item">Cerrar Sesión</a>
    </div>
<p class="usuario">Bienvenido</p> <!--Colocar el usuario-->

<br><br>
    <div class="container">
        <div class="left-column">     <!--columna izquierda-Menu-->
            <ul>
                <li><a href="../Recepcionista/ver_historial.php"class="menu-principal">Ver Historial Clinico</a></li>
                <li><a href="../Recepcionista/ver_cita-R.php"class="menu-principal">Citas Pendientes</a></li>
                <li><a href="../Recepcionista/crear_cita.php"class="menu-principal">Crear Cita</a></li>
            </ul>
        </div>

<div class="right-column">                    <!--columna derecha-->
   <!-- FORMULARIO DE AGENDAR CITA -->

   <h3>Formulario de Agendar Cita</h3>
   <form>
        <fieldset>
            <legend>Datos del Paciente</legend>
        
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" class="form-control">

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control">
        
                <label for="tipo_identificacion">Tipo de identificación:</label>
                <input type="text" id="tipo_identificacion" name="tipo_identificacion" class="form-control">
        
                <label for="identificacion">Identificación:</label>
                <input type="text" id="identificacion" name="identificacion" class="form-control">

                <label>Teléfono:</label>
                <input type="tel" name="telefono" placeholder="ingresar numero de telefono del paciente">
          
                <label>Estado civil:</label>
                <input type="text" name="estado_civil" placeholder="Ingresar si esta casado, soltero u otro">
         
                <label for="sexo">Sexo:</label>
                <input type="text" id="sexo" name="sexo" class="form-control">
        
                <label for="fecha_solicitud">Fecha solicitud:</label>
                <input type="date" id="fecha_solicitud" name="fecha_solicitud">
                
                <label for="fecha_programada">Fecha programada:</label>
                <input type="date" id="fecha_programada" name="fecha_programada">
         </div>
     </fieldset>
     <fieldset>
        <legend>Motivo de consulta</legend>
            <input type="text" id="motivo" name="motivo_consulta">
     </fieldset>

     <button class="button">Agendar</button>
   </form>

</div>
</body>
</html>