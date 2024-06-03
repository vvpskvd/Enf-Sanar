<?php

session_start();

function verificarRol($rolPermitido) {
    if (!isset($_SESSION["usuario"])) {
        header("location:../../login/login.php");
        exit;
    } elseif ($_SESSION["rol"] != $rolPermitido) {
        header("location:../../login/login.php");
        exit;
    }
}

verificarRol('enfermera');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta - EnfSanar</title>
    <link rel="icon" href="../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="../../Enfermera/index.php">
                    <img src="../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

            <ul class="menu-principal">
                <li><a href="../../Enfermera/F_Consulta/ingresar/index.php" class="menu-principal">Consulta</a></li>
                <li><a href="../../Enfermera/F_Procedimiento/ingresar/index.php" class="menu-principal">Procedimiento</a></li>
                <li><a href="index.php" class="menu-principal">Ver Citas</a></li>
                <li><a href="../../Login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
            </ul>

        </div>

    </nav>


    <div class="container-form">

        <form action="index.php" method="post">

            <div class="div-form">

                <fieldset>
                    <legend>Consulta de Citas</legend>

                    <label>Tipo de Cita:</label>
                    <select id="tipo_cita" name="tipo_cita">
                        <option value="consulta">Consulta</option>
                        <option value="procedimiento">Procedimiento</option>
                    </select>

                    <label>ID de la cita:</label>
                    <input type="text" id="id_cita" name="id_cita" placeholder="Ingresar código de la cita">

                    <label>Identificación del Paciente:</label>
                    <input type="number" id="id_paciente" name="id_paciente" placeholder="Ingresar número de identidad del paciente">

                    <label>Fecha de Solicitud:</label>
                    <input type="date" id="fecha_solicitud" name="fecha_solicitud">

                    <label>Fecha de Programación:</label>
                    <input type="date" id="fecha_programada" name="fecha_programada">

                    <label>Hora Programada:</label>
                    <input type="time" id="hora_programada" name="hora_programada">
                </fieldset>

            </div>

        <!-- Tabla para mostrar resultados -->
        <div class="div-form">
            <fieldset>
                <legend>Resultados de la Consulta</legend>
                <table>
                    <thead>
                        <tr>
                            <th>ID Cita</th>
                            <th>ID Paciente</th>
                            <th>Fecha Solicitud</th>
                            <th>Fecha Programada</th>
                            <th>Hora Programada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se insertarán los resultados desde PHP -->
                        <?php
                        if (isset($_POST['id_cita']) || isset($_POST['id_paciente']) || isset($_POST['fecha_solicitud']) 
                        || isset($_POST['fecha_programada']) || isset($_POST['hora_programada'])) {
                            include 'modelo.php';
                        }
                        ?>
                    </tbody>
                </table>
            </fieldset>
        </div>

    </div>

        <div class="buttom-end">
            <ul>
                <li><input type="submit" value="Consultar"></li>
            </ul>
        </div>

    </form>


</body>

</html>