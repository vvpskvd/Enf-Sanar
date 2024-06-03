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
    <title>Editar Consulta Médica</title>
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

        <form action="modelo.php"  method="post">

            <div class="div-form">

                <fieldset>
                    <legend>Editar Consulta Médica</legend>
                    <input type="hidden" name="id_consulta" value="<?php echo $id_consulta; ?>">

                    <label for="id_cita">ID Cita:</label>
                    <input type="text" name="id_cita" value="<?php echo $id_cita; ?>"><br><br>

                    <label for="id_enfermera">ID Enfermera:</label>
                    <input type="text" name="id_enfermera" value="<?php echo $id_enfermera; ?>"><br><br>

                    <label for="id_paciente">ID Paciente:</label>
                    <input type="text" name="id_paciente" value="<?php echo $id_paciente; ?>"><br><br>

                    <label for="diagnostico_principal">Diagnóstico Principal:</label>
                    <input type="text" name="diagnostico_principal" value="<?php echo $diagnostico_principal; ?>"><br><br>

                    <label for="motivo_consulta">Motivo Consulta:</label>
                    <input type="text" name="motivo_consulta" value="<?php echo $motivo_consulta; ?>"><br><br>

                    <label for="largo">Largo:</label>
                    <input type="text" name="largo" value="<?php echo $largo; ?>"><br><br>

                    <label for="ancho">Ancho:</label>
                    <input type="text" name="ancho" value="<?php echo $ancho; ?>"><br><br>

                    <label for="profundidad">Profundidad:</label>
                    <input type="text" name="profundidad" value="<?php echo $profundidad; ?>"><br><br>

                    <label for="forma">Forma:</label>
                    <input type="text" name="forma" value="<?php echo $forma; ?>"><br><br>
                </fieldset>

            </div>

            <div class="div-form">

                <fieldset>
                    
                    <legend> </legend>
                    <label for="olor">Olor:</label>
                    <input type="text" name="olor" value="<?php echo $olor; ?>"><br><br>

                    <label for="bordes_herida">Bordes de la Herida:</label>
                    <input type="text" name="bordes_herida" value="<?php echo $bordes_herida; ?>"><br><br>

                    <label for="infeccion">Infección:</label>
                    <input type="text" name="infeccion" value="<?php echo $infeccion; ?>"><br><br>

                    <label for="exudado_tipo">Tipo de Exudado:</label>
                    <input type="text" name="exudado_tipo" value="<?php echo $exudado_tipo; ?>"><br><br>

                    <label for="exudado_nivel">Nivel de Exudado:</label>
                    <input type="text" name="exudado_nivel" value="<?php echo $exudado_nivel; ?>"><br><br>

                    <label for="fecha_atencion">Fecha de Atención:</label>
                    <input type="text" name="fecha_atencion" value="<?php echo $fecha_atencion; ?>"><br><br>

                    <label for="hora_inicio">Hora de Inicio:</label>
                    <input type="text" name="hora_inicio" value="<?php echo $hora_inicio; ?>"><br><br>

                    <label for="hora_final">Hora de Finalización:</label>
                    <input type="text" name="hora_final" value="<?php echo $hora_final; ?>"><br><br>
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
