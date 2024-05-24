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
   <!-- FORMULARIO PROCEDIMIENTOS MÉDICOS -->

  <h3>Formulario de Procedimiento Médico</h3>
  <form>
    <fieldset>
      <legend>Enfermera a Cargo</legend>
      <label>Nombre Enfermera:</label>
      <input type="text" id="nombre_enfermera" name="nombre_enfermera" placeholder="Ingresar nombre de la enfermera">

      <legend>Datos del Paciente</legend>

      <label>Identificación paciente:</label>
      <input type="number" name="identificacion" placeholder="ingresar numero de identidad del paciente ">

      <label>Tipo Identificación paciente:</label>
      <input type="text" name="tipo_documento" placeholder="ingresar tipo de identificacion del paciente ">

      <label>Nombre Paciente:</label>
      <input type="text" name="nombre" placeholder="Ingresar nombre completo del paciente o la paciente">

      <label>Apellido Paciente:</label>
      <input type="text" name="apellido" placeholder="Ingresar apellido completo del paciente o la paciente">

      <label>Teléfono:</label>
      <input type="tel" name="telefono" placeholder="ingresar numero de telefono del paciente">
<!--Por favor agregar estos de abajo a la base de datos-->
      <label>Edad:</label>
      <input type="number" name="edad" placeholder="ingresar edad">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <label>Fecha de Nacimiento:</label>
      <input type="date" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento del paciente">

      <legend>Genero:</legend>        
      <label>Seleccione:</label>
        <input type="checkbox" name="sexo">Masculino
        <br>
        <input type="checkbox" name="sexo">Femenino

      <legend>Tipo de Sangre:</legend>        
      <label>Seleccione:</label>
        <input type="checkbox" name="tipo_sangre">A+
        <input type="checkbox" name="tipo_sangre">A-
        <br>
        <input type="checkbox" name="tipo_sangre">B+
        <input type="checkbox" name="tipo_sangre">B-
        <br>
        <input type="checkbox" name="tipo_sangre">AB+
        <input type="checkbox" name="tipo_sangre">AB-
        <br>
        <input type="checkbox" name="tipo_sangre">O+
        <input type="checkbox" name="tipo_sangre">O-
      <br><br>
      <label>Correo:</label>
      <input type="text" name="correo" placeholder="Ingresar el correo electronco del paciente">

      <label>Ocupación Paciente:</label>
      <input type="text" name="ocupacion" placeholder="ingresar oficio del paciente">

      <label>Entidad:</label>
      <input type="text" name="entidad" placeholder="Ingresar si esta casado, soltero u otro">

      <label>Estado civil:</label>
      <input type="text" name="estado_civil" placeholder="Ingresar si esta casado, soltero u otro">

      <label>Ocupación Paciente:</label>
      <input type="text" name="ocupacion" placeholder="ingresar oficio del paciente">
    </fieldset>
  </form>
      
  <!-- FORMULARIO CONSULTAS MÉDICAS -->

  <h3>Formulario de Consulta</h3>

  <form>
    <fieldset>
      <label>Fecha de atención:</label>
      <input type="date" name="fecha_atencion">
    </fieldset>

    <fieldset>
      <legend>Diagnóstico y Comorbilidades</legend>

      <label>Diagnóstico principal (CIE-10 código):</label>
      <input type="text" name="diagnostico_principal" placeholder="ingresar el motivo general mencionado por el paciente">

      <label>Motivo de consulta (descripción del código CIE-10):</label>
      <textarea name="motivo_consulta" placeholder="ingresar detalladamente el motivo de consulta"></textarea>

      <legend>Comorbilidades:</legend>        
      <label>Seleccione comorbilidades:</label>
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">Enfermedades hipertensivas
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">Diabetes
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">Insuficiencia renal
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">VIH
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">Cáncer
      <br>
      <input type="checkbox" class="comorbidity" name="comorbilidades">Tuberculosis
      <br>
      <input type="checkbox" name="comorbilidades">EPOC
      <br>
      <input type="checkbox" name="comorbilidades">Asma
      <br>
      <input type="checkbox" name="comorbilidades">Obesidad
      <br>
      <input type="checkbox" name="comorbilidades">En lista de espera de trasplante y post trasplante de órganos vitales
      <br>
      <input type="checkbox" name="comorbilidades">Inmunodeficiencia primaria
      <br>
      <input type="checkbox" name="comorbilidades">Fibrosis quística
      <br>
      <input type="checkbox" name="comorbilidades">Enfermedad isquémica aguda del corazón
      <br>
      <input type="checkbox" name="comorbilidades">Insuficiencia cardiaca
      <br>
      <input type="checkbox" name="comorbilidades">Arritmias cardiacas
      <br>
      <input type="checkbox" name="comorbilidades">Enfermedad cerebrovascular
      <br>
      <input type="checkbox" name="comorbilidades">Síndrome de Down
      <br>
      <input type="checkbox" name="comorbilidades">Esquizofrenia, trastorno esquizotípico y trastornos de ideas delirantes
      <br>
      <input type="checkbox" name="comorbilidades">Autismo
    </fieldset>

    <fieldset>
      <legend>Características de la Herida</legend>

      <label>Característica de la herida:</label>
      <input type="text" name="caracteristica_herida" placeholder="Describa las características de la herida ">

      <label>Largo:</label>
      <input type="number" name="largo" placeholder="Largo de la herida">

      <label>Ancho:</label>
      <input type="number" name="ancho" placeholder="Ancho de la herida">

      <label>Profundidad:</label>
      <input type="number" name="profundidad" placeholder="Profundidad de la herida">

      <label>Forma:</label>
      <input type="text" name="forma" placeholder="forma especifica de la herida">

      <label>Olor:</label>
      <input type="text" name="olor" placeholder="Presenta mal olor o no">

      <label>Bordes de la herida:</label>
      <input type="text" name="bordes_herida" placeholder="">

      <label>Infección diseminada:</label>
      <input type="text" name="infeccion_diseminada" placeholder="">

      <label>Infección local:</label>
      <input type="text" name="infeccion_local" placeholder="">

      <label>Tipo de exudado:</label>
      <input type="text" name="tipo_exudado" placeholder="">

      <label>Nivel de exudado:</label>
      <input type="number" name="nivel_exudado" placeholder="">
    </fieldset>

    <fieldset>
      <legend>Insumos Requeridos y Notas</legend>

      <label>Insumos requeridos:</label>
      <textarea name="insumos_requeridos" placeholder="Enumere los insumos requeridos para el procedimiento"></textarea>

      <label for="analisis">Análisis:</label>
      <textarea id="analisis" name="analisis" required></textarea>
      <br>
      <label for="evolucion">Evolución:</label>
      <textarea id="evolucion" name="evolucion" required></textarea>
      <br>
      <label for="plan_cuidado">Plan de cuidado:</label>
      <textarea id="plan_cuidado" name="plan_cuidado" required></textarea>
      <br>

      <label for="recomendacion">Recomendación:</label>
      <textarea id="recomendacion" name="recomendacion" required></textarea>
      <br>
      <label>Notas:</label>
      <textarea name="notas" placeholder=" Ingrese cualquier observación relevante"></textarea>
    </fieldset>
    <button class="button">Guardar</button>
  </form>
  
</div>
</body>
</html>