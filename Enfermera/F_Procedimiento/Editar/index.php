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

    <div class="right-column">

        <form action="guardar_edicion.php" method="post">

            <div class="div-form">

                <fieldset>
                    <legend>Editar Cita</legend>

                    <!-- Campo oculto para almacenar el ID de la cita a editar -->
                    <input type="hidden" id="id_cita" name="id_cita" value="<?php echo $_GET['id']; ?>">

                    <!-- Los demás campos del formulario con valores predefinidos obtenidos de la base de datos -->
                    <label>Tipo de Cita:</label>
                    <select id="tipo_cita" name="tipo_cita">
                        <option value="consulta">Consulta</option>
                        <option value="procedimiento">Procedimiento</option>
                    </select>

                    <label>ID de la cita:</label>
                    <input type="text" id="id_cita" name="id_cita" value="<?php echo $row['id_cita']; ?>" readonly>

                    <label>Identificación del Paciente:</label>
                    <input type="number" id="id_paciente" name="id_paciente" value="<?php echo $row['id_paciente']; ?>">

                    <label>Fecha de Solicitud:</label>
                    <input type="date" id="fecha_solicitud" name="fecha_solicitud" value="<?php echo $row['fecha_solicitud']; ?>">

                    <label>Fecha de Programación:</label>
                    <input type="date" id="fecha_programada" name="fecha_programada" value="<?php echo $row['fecha_programada']; ?>">

                    <label>Hora Programada:</label>
                    <input type="time" id="hora_programada" name="hora_programada" value="<?php echo $row['hora_programada']; ?>">
                </fieldset>

            </div>

            <div class="menu-bar">
                <div class="buttom-end">
                    <ul>
                        <li><input type="submit" value="Guardar Cambios"></li>
                    </ul>
                </div>
            </div>

        </form>

    </div>

</body>

</html>
