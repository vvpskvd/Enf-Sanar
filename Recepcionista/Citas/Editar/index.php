<?php include '../../../recepcionista/validar_sesion.php';
verificarRol('recepcionista');

include ("modelo.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita Médica</title>
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

            <fieldset>
                <legend>Editar Cita</legend>
                <input type="hidden" name="tipo_cita" value="<?php echo $tipo_cita; ?>">
                <input type="hidden" name="id_cita" value="<?php echo $id_cita; ?>">

                <label for="id_paciente">ID Paciente:</label>
                <input type="text" name="id_paciente" value="<?php echo $id_paciente; ?>"><br><br>

                <label for="fecha_solicitud">Fecha de Solicitud:</label>
                <input type="date" name="fecha_solicitud" value="<?php echo $fecha_solicitud; ?>"><br><br>

                <label for="fecha_programada">Fecha Programada:</label>
                <input type="date" name="fecha_programada" value="<?php echo $fecha_programada; ?>"><br><br>
                
                <label for="hora_programada">Hora Programada:</label>
                <input type="time" name="hora_programada" value="<?php echo $hora_programada; ?>"><br><br>
                
            </fieldset>
    </div>

            <div class="buttom-end">
                    <ul>
                        <li><input type="submit" name="actualizar" value="Actualizar"></li>
                        <li><input type="submit" name="eliminar" value="Eliminar"></li>
                        <li><a href="../Consultar/index.php" class="menu-principal" onclick='window.close();'>Cerrar</a></li>
                    </ul>
            </div>

        </form>


</body>

</html>
