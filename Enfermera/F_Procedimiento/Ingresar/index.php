<?php include '../../../enfermera/validar_sesion.php';
verificarRol('enfermera');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Procedimiento Médico</title>
    <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="../../../Enfermera/index.php">
                    <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

            <ul class="menu-principal">
                <li><a href="../../F_Consulta/Ingresar/index.php" class="menu-principal">Consulta</a></li>
                <li><a href="index.php" class="menu-principal">Procedimiento</a></li>
                <li><a href="../../Ver_Citas/index.php" class="menu-principal">Ver Citas</a></li>
                <li><a href="../../../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
            </ul>

        </div>

    </nav>

    <div class="container-form">

        <form action="modelo.php" method="post">

            <div class="div-form">

                <fieldset>
                    <legend>ID Cita</legend>
                    <input type="text" id="id_cita" name="id_cita" placeholder="Ingresar el ID de la cita relacionada con la consulta">
                </fieldset>

                <fieldset>
                    <legend>ID Consulta</legend>
                    <input type="text" id="id_consulta" name="id_consulta" placeholder="Ingresar el ID de la consulta relacionada con el procedimiento">
                </fieldset>

                <fieldset>
                    <legend>Enfermera a Cargo</legend>
                    <label>Nombre:</label>
                    <input type="text" id="nombre_enfermera" name="nombre_enfermera" placeholder="Ingresar primer nombre de la enfermera"> <!-- no conectar -->
                    <label>Apellido:</label>
                    <input type="text" name="apellido_enfermera" placeholder="Ingresar primer apelldio de la enfermera"> <!-- no conectar -->
                    <label>Identificación:</label>
                    <input type="number" id="id_enfermera" name="id_enfermera" placeholder="Ingresar numero de identidad de la enfermera">
                </fieldset>

                <fieldset>
                    <legend>Paciente</legend>

                    <label>Nombre:</label>
                    <input type="text" name="nombre_paciente" placeholder="Ingresar primer nombre del paciente"> <!-- no conectar -->

                    <label>Apellido:</label>
                    <input type="text" name="apellido_paciente" placeholder="Ingresar primer apelldio del paciente"> <!-- no conectar -->

                    <label>Identificación paciente:</label>
                    <input type="number" name="id_paciente" name="id_paciente" placeholder="Ingresar numero de identidad del paciente">
                </fieldset>

            </div>

            <div class="div-form">

                <fieldset>
                    <legend>Diagnóstico</legend>

                    <label for="analisis">Análisis:</label>
                    <select id="analisis" name="analisis">
                        <option value="Ninguno">Ninguno</option>
                        <option value="Biopsia de la herida">Biopsia de la herida</option>
                        <option value="Cultivo bacteriano">Cultivo bacteriano</option>
                        <option value="Cultivo viral">Cultivo viral</option>
                        <option value="Cultivo fúngico">Cultivo fúngico</option>
                        <option value="Prueba de sensibilidad a antibióticos">Prueba de sensibilidad a antibióticos</option>
                        <option value="Prueba de sensibilidad a antifúngicos">Prueba de sensibilidad a antifúngicos</option>
                        <option value="Prueba de sensibilidad a antivirales">Prueba de sensibilidad a antivirales</option>
                        <option value="Biopsia de tejido circundante">Biopsia de tejido circundante</option>
                    </select>

                    <label for="evolucion">Evolución:</label>
                    <select id="evolucion" name="evolucion">
                        <option value="Sin cambios">Sin cambios</option>
                        <option value="Mejorando">Mejorando</option>
                        <option value="Estable">Estable</option>
                        <option value="Empeorando">Empeorando</option>
                    </select>

                    <label for="plan_de_cuidado">Plan de Cuidado:</label>
                    <select id="plan_cuidado" name="plan_de_cuidado">
                        <option value="Limpieza y desinfección diaria">Limpieza y desinfección diaria</option>
                        <option value="Aplicación de apósitos">Aplicación de apósitos</option>
                        <option value="Control de infecciones">Control de infecciones</option>
                        <option value="Cambio de apósitos">Cambio de apósitos</option>
                        <option value="Control del dolor">Control del dolor</option>
                    </select>


                    <label for="recomendacion">Recomendacion:</label>
                    <select id="recomendacion" name="recomendacion">
                        <option value="Mantener la herida limpia y seca">Mantener la herida limpia y seca</option>
                        <option value="Evitar rascarse o frotar la herida">Evitar rascarse o frotar la herida</option>
                        <option value="Aplicar vendajes adecuados">Aplicar vendajes adecuados</option>
                        <option value="Evitar la exposición prolongada al sol">Evitar la exposición prolongada al sol</option>
                        <option value="Seguir las indicaciones médicas al pie de la letra">Seguir las indicaciones médicas al pie de la letra</option>
                        <option value="Realizar cambios posturales para aliviar la presión en la herida">Realizar cambios posturales para aliviar la presión en la herida</option>
                    </select>


                    <label for="finalidad_procedimiento">Finalidad del Procedimiento:</label>
                    <select id="finalidad_procedimiento" name="finalidad_procedimiento">
                        <option value="Limpieza de la herida">Limpieza de la herida</option>
                        <option value="Desbridamiento">Desbridamiento</option>
                        <option value="Aplicación de apósitos">Aplicación de apósitos</option>
                        <option value="Sutura de la herida">Sutura de la herida</option>
                        <option value="Extracción de cuerpos extraños">Extracción de cuerpos extraños</option>
                        <option value="Control de hemorragias">Control de hemorragias</option>
                        <option value="Estudio y diagnóstico de la herida">Estudio y diagnóstico de la herida</option>
                        <option value="Prevención de infecciones">Prevención de infecciones</option>
                        <option value="Promoción de la cicatrización">Promoción de la cicatrización</option>
                        <option value="Tratamiento de úlceras">Tratamiento de úlceras</option>
                    </select>

                    <label>Cups:</label>
                    <input type="number" id="cups" name="cups" placeholder="Ingresar numero de identidad del paciente">
                </fieldset>

            </div>


            <div class="div-form">

                <fieldset>
                    <legend>Atención</legend>
                    <label>Fecha de atención:</label>
                    <input type="date" id="fecha_atencion" name="fecha_atencion">
                    <label>Hora de atención:</label>
                    <input type="time" id="hora_inicio" name="hora_inicio">
                    <label>Hora de finalización:</label>
                    <input type="time" id="hora_final" name="hora_final">
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