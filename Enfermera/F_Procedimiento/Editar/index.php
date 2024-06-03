<?php
include '../../../enfermera/validar_sesion.php';
verificarRol('enfermera');

include ("modelo.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Procedimiento Médico - EnfSanar</title>
    <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="../../../enfermera/index.php">
                    <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

        </div>

    </nav>


    <div class="container-form">

        <form action="modelo.php"  method="post">

            <div class="div-form">

                <fieldset>
                    <legend>Editar Procedimiento Médico</legend>

                    <input type="hidden" name="id_procedimiento" value="<?php echo $id_procedimiento; ?>">

                    <label for="id_consulta">ID Cita:</label>
                    <input type="text" name="id_consulta" value="<?php echo $id_consulta; ?>">

                    <label for="id_cita">ID Cita:</label>
                    <input type="text" name="id_cita" value="<?php echo $id_cita; ?>">
                    <label for="id_enfermera">ID Enfermera:</label>
                    <input type="text" name="id_enfermera" value="<?php echo $id_enfermera; ?>">
                    <label for="id_paciente">ID Paciente:</label>
                    <input type="text" name="id_paciente" value="<?php echo $id_paciente; ?>">

                    <label for="analisis">Análisis:</label>
                    <input type="text" name="analisis" value="<?php echo $analisis; ?>">

                    <label for="evolucion">Evolución:</label>
                    <input type="text" name="evolucion" value="<?php echo $evolucion; ?>">

                    <label for="plan_de_cuidado">Plan de Cuidado:</label>
                    <input type="text" name="plan_de_cuidado" value="<?php echo $plan_de_cuidado; ?>">
                </fieldset>

            </div>

                <div class="div-form">

                    <fieldset>
                        <legend> </legend>
                        <label for="recomendacion">Recomendación:</label>
                        <input type="text" name="recomendacion" value="<?php echo $recomendacion; ?>">

                        <label for="finalidad_procedimiento">Finalidad del Procedimiento:</label>
                        <input type="text" name="finalidad_procedimiento" value="<?php echo $finalidad_procedimiento; ?>">

                        <label for="cups">CUPS:</label>
                        <input type="text" name="cups" value="<?php echo $cups; ?>">

                        <label for="fecha_atencion">Fecha de Atención:</label>
                        <input type="text" name="fecha_atencion" value="<?php echo $fecha_atencion; ?>">

                        <label for="hora_inicio">Hora de Inicio:</label>
                        <input type="text" name="hora_inicio" value="<?php echo $hora_inicio; ?>">

                        <label for="hora_final">Hora de Finalización:</label>
                        <input type="text" name="hora_final" value="<?php echo $hora_final; ?>">
                </fieldset>
                
            </div>
    </div>

            <div class="buttom-end">

                <ul>
                    <li><input type="submit" name="actualizar" value="Actualizar"></li>
                    <li><input type="submit" name="eliminar" value="Eliminar"></li>
                    <li><a href="../Consultar/index.php" class="menu-principal" onclick="window.close()">Cerrar</a></li>
                </ul>

            </div>

        </form>


</body>

</html>
