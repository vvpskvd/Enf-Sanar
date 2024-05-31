<?php
include ("modelo.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita - EnfSanar</title>
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
                    <li><a href="../ingresar/index.php" class="menu-principal">Citas</a></li>
                    <li><a href="../../../Recepcionista/Pacientes/ingresar/index.php" class="menu-principal">Pacientes</a></li>
                    <li><a href="../../../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="right-column container-form">

        <form action="modelo.php"  method="post">

            <div class="div-form">

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
    </div>

            <div class="menu-bar">
                <div class="buttom-end">
                    <ul>
                    <li><input type="submit" name="actualizar" value="Actualizar"></li>
                    <input type="submit" name="eliminar" value="Eliminar">
                    <li><a href="../Consultar/index.php" class="menu-principal">Atrás</a></li>
                    </ul>
                </div>
            </div>

        </form>


</body>

</html>
