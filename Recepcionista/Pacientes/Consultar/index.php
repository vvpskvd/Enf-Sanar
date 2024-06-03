<?php include '../../../recepcionista/validar_sesion.php';
verificarRol('recepcionista');
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pacientes</title>
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
                    <legend>Consulta de Pacientes</legend>

                    <label>Identificación del Paciente:</label>
                    <input type="number" id="identificacion" name="identificacion" placeholder="Ingresar número de identidad del paciente">

                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre">

                    <label>Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apellido">
                    
                    <label>Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingresar la fecha de nacimiento">

                    <label>Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Ingresar el teléfono">

                    <label>Correo:</label>
                    <input type="text" id="correo" name="correo" placeholder="Ingresar el correo electrónico">
                </fieldset>

            </div>

        <!-- Tabla para mostrar resultados -->
            <div class="div-form">
                <fieldset>
                    <legend>Resultados de la Consulta</legend>

                <div class="tabla-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Tipo Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Barrio</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Tipo Sangre</th>
                                <th>Correo</th>
                                <th>Ocupación</th>
                                <th>Entidad</th>
                                <th>Estado Civil</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se insertarán los resultados desde PHP -->
                            <?php
                            if (isset($_POST['identificacion']) || isset($_POST['tipo_documento']) || isset($_POST['nombre']) 
                            || isset($_POST['apellido']) || isset($_POST['telefono']) || isset($_POST['direccion']) 
                            || isset($_POST['barrio']) || isset($_POST['fecha_nacimiento']) || isset($_POST['sexo']) 
                            || isset($_POST['tipo_sangre']) || isset($_POST['correo']) || isset($_POST['ocupacion']) 
                            || isset($_POST['entidad']) || isset($_POST['estad_civil'])) {
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
                    <li><a href="../Ingresar/index.php" class="menu-principal" onclick='window.close();'>Cerrar</a></li>
                </ul>
            </div>

        </form>

</body>

</html>
