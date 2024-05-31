<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Pacientes - EnfSanar</title>
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Barrio</th>
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
                        if (isset($_POST['identificacion']) || isset($_POST['nombre']) || isset($_POST['apellido']) 
                        || isset($_POST['telefono']) || isset($_POST['direccion']) || isset($_POST['barrio']) 
                        || isset($_POST['correo']) || isset($_POST['ocupacion']) || isset($_POST['entidad']) 
                        || isset($_POST['estad_civil'])) {
                            include 'modelo.php';
                        }
                        ?>
                    </tbody>
                </table>

            </div>

            </fieldset>
        </div>

    </div>

        <div class="menu-bar">
            <div class="buttom-end">
            <ul>
            <li><input type="submit" value="Consultar"></li>
            </ul>
            </div>
        </div>

    </form>

</body>

</html>
