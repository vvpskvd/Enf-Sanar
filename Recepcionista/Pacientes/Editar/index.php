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
                    <legend>Editar Paciente</legend>
                    <input type="hidden" name="identificacion" value="<?php echo $identificacion; ?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br><br>

                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $apellido; ?>"><br><br>

                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" value="<?php echo $telefono; ?>"><br><br>
                    
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" value="<?php echo $direccion; ?>"><br><br>
                    
                    <label for="barrio">Barrio:</label>
                    <input type="text" name="barrio" value="<?php echo $barrio; ?>"><br><br>
                    
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" value="<?php echo $correo; ?>"><br><br>
                    
                    <label for="ocupacion">Ocupación:</label>
                    <input type="text" name="ocupacion" value="<?php echo $ocupacion; ?>"><br><br>

                    <label for="entidad">Entidad:</label>
                    <input type="text" name="entidad" value="<?php echo $entidad; ?>"><br><br>

                    <label for="estado_civil">Estado Civil:</label>
                    <input type="text" name="estado_civil" value="<?php echo $estado_civil; ?>"><br><br>
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
