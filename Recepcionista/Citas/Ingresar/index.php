<?php include '../../../recepcionista/validar_sesion.php';
verificarRol('recepcionista');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Cita Médica</title>
    <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="../../../Recepcionista/index.php">
                    <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

            <ul class="menu-principal">
                <li><a href="index.php">Citas</a></li>
                <li><a href="../../../Recepcionista/Pacientes/ingresar/index.php">Pacientes</a></li>
                <li><a href="../../../login/logout.php">Cerrar Sesión</a></li>
            </ul>

        </div>

    </nav>

    <div class="container-form">

        <form action="modelo.php" method="post">

            <fieldset>

                <label>Tipo de Cita:</label>
                    <select id="tipo" name="tipo">
                        <option value="consulta">Consulta</option>
                        <option value="procedimiento">Procedimiento</option>
                    </select>
                    
            </fieldset>

            <fieldset>

                <legend>Paciente</legend>

                <label>Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre del paciente"> <!-- no conectar -->

                <label>Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apelldio del paciente"> <!-- no conectar -->

                <label>Identificación:</label>
                <input type="number" id="id_paciente" name="id_paciente" placeholder="Ingresar numero de identidad del paciente">
            </fieldset>

            <fieldset>

                <legend>Fecha</legend>

                <label>Fecha solicitud:</label>
                <input type="date" id="fecha_solicitud" name="fecha_solicitud">

                <label>Fecha programada:</label>
                <input type="date" id="fecha_programada" name="fecha_programada">

                <label>Hora programada:</label>
                <input type="time" id="hora_programada" name="hora_programada">

            </fieldset>

    </div>


            <div class="buttom-end">
                <ul>
                    <li><input type="submit" value="Guardar"></li>
                    <li><a href="../Consultar/index.php" target="_blank">Consultar</a></li>
                </ul>
            </div>


        </form>


</body>

</html>