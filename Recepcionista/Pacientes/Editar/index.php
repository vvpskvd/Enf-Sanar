<?php
include '../../../recepcionista/validar_sesion.php';
verificarRol('recepcionista');

include ("modelo.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
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
                    <legend>Editar Paciente</legend>
                    <input type="hidden" name="identificacion" value="<?php echo $identificacion; ?>">

                    <label for="tipo_documento">Tipo de documento:</label>
                    <input type="text" name="tipo_documento" value="<?php echo $tipo_documento; ?>">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>">

                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $apellido; ?>">

                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" value="<?php echo $telefono; ?>">
                    
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" value="<?php echo $direccion; ?>">
                    
                    <label for="barrio">Barrio:</label>
                    <input type="text" name="barrio" value="<?php echo $barrio; ?>">

                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                </fieldset>
            </div>

            <div class="div-form">

                <fieldset>
                    <legend> </legend>
                    <label for="sexo">Sexo:</label>
                    <input type="text" name="sexo" value="<?php echo $sexo; ?>">

                    <label for="tipo_sangre">Tipo de Sangre:</label>
                    <input type="text" name="tipo_sangre" value="<?php echo $tipo_sangre; ?>">
                    
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" value="<?php echo $correo; ?>">
                    
                    <label for="ocupacion">Ocupación:</label>
                    <input type="text" name="ocupacion" value="<?php echo $ocupacion; ?>">

                    <label for="entidad">Entidad:</label>
                    <input type="text" name="entidad" value="<?php echo $entidad; ?>">

                    <label for="estado_civil">Estado Civil:</label>
                    <input type="text" name="estado_civil" value="<?php echo $estado_civil; ?>">
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
