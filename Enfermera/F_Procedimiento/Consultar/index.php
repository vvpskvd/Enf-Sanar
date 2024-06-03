<?php include '../../../enfermera/validar_sesion.php';
verificarRol('enfermera');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Procedimiento Médico</title>
    <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

        </div>
        
    </nav>


    <div class="container-form">

        <form action="index.php" method="post">

            <div class="div-form">

                <fieldset>
                    <legend>Consulta de Procedimientos Médicos</legend>

                    <label>ID del Procedimiento:</label>
                    <input type="text" id="id_procedimiento" name="id_procedimiento" placeholder="Ingresar código del procedimiento">

                    <label>ID de la Consulta:</label>
                    <input type="text" id="id_consulta" name="id_consulta" placeholder="Ingresar código de la consulta">

                    <label>ID de la Cita:</label>
                    <input type="text" id="id_cita" name="id_cita" placeholder="Ingresar código de la cita">

                    <label>Identificación de la Enfermera:</label>
                    <input type="number" id="id_enfermera" name="id_enfermera" placeholder="Ingresar número de identidad de la enfermera">

                    <label>Identificación del Paciente:</label>
                    <input type="number" id="id_paciente" name="id_paciente" placeholder="Ingresar número de identidad del paciente">

                    <label>Fecha de Atención:</label>
                    <input type="date" id="fecha_atencion" name="fecha_atencion">

                    <label>Hora de Inicio:</label>
                    <input type="time" id="hora_inicio" name="hora_inicio">

                    <label>Hora de Finalización:</label>
                    <input type="time" id="hora_final" name="hora_final">
                </fieldset>

            </div>

        <!-- Tabla para mostrar resultados -->
            <div class="div-form">
                <fieldset>
                    <legend>Resultados de la Consulta</legend>

                <div class = "tabla-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Procedimiento</th>
                                <th>ID Consulta</th>
                                <th>ID Cita</th>
                                <th>ID Enfermera</th>
                                <th>ID Paciente</th>
                                <th>Análisis</th>
                                <th>Evolución</th>
                                <th>Plan de Cuidado</th>
                                <th>Recomendación</th>
                                <th>Finalidad del Procedimiento</th>
                                <th>CUPS</th>
                                <th>Fecha de Atención</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Finalización</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se insertarán los resultados desde PHP -->
                            <?php
                            if (isset($_POST['id_procedimiento']) || isset($_POST['id_consulta']) || isset($_POST['id_cita']) || isset($_POST['id_enfermera']) 
                                || isset($_POST['id_paciente']) || isset($_POST['analisis']) || isset($_POST['evolucion']) 
                                || isset($_POST['plan_de_cuidado']) || isset($_POST['recomendacion']) || isset($_POST['finalidad_procedimiento']) 
                                || isset($_POST['cups']) || isset($_POST['fecha_atencion']) || isset($_POST['hora_inicio']) 
                                || isset($_POST['hora_final'])) 
                            {
                                include 'modelo.php';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                </fieldset>
            </div>

    </div>

            <div class="buttom-end">
    
                <ul>
                    <li><input type="submit" value="Consultar"></li>
                    <li><a href="../Ingresar/index.php" class="menu-principal" onclick="window.close()">Cerrar</a></li>
                </ul>
            
            </div>


        </form>


</body>

</html>