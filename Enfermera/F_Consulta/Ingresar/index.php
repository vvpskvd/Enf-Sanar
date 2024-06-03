<?php include '../../../enfermera/validar_sesion.php';
verificarRol('enfermera');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Consulta Médica</title>
    <link rel="icon" href="../../../Img/LogoImageWeb.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <nav class="container">

        <div class="box-menu">

            <div class="logo">
                <a href="../../../Enfermera/index.php">
                    <img src="../../../Img/LogoImageWEB.png" alt="Image"></a>
            </div>

            <ul class="menu-principal">
                <li><a href="index.php" class="menu-principal">Consulta</a></li>
                <li><a href="../../../Enfermera/F_Procedimiento/ingresar/index.php" class="menu-principal">Procedimiento</a></li>
                <li><a href="../../Ver_Citas/index.php" class="menu-principal">Ver Citas</a></li>
                <li><a href="../../../login/logout.php" class="menu-principal">Cerrar Sesión</a></li>
            </ul>

        </div>

    </nav>


    <div class="container-form">

        <form action="modelo.php" method="post">

            <div class="div-form">

                <fieldset>
                    <legend>ID Cita</legend>
                    <input type="text" id="id_cita" name="id_cita" placeholder="Ingresar el ID de la cita relacionada con la consulta">
                </fieldset>

                <fieldset>
                    <legend>Enfermera a Cargo</legend>

                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresar primer nombre"> <!-- no conectar -->

                    <label>Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingresar primer apelldio"> <!-- no conectar -->

                    <label>Identificación:</label>
                    <input type="number" id="id_enfermera" name="id_enfermera" placeholder="Ingresar numero de identidad de la enfermera">
                </fieldset>

                <fieldset>
                    <legend>Paciente</legend>

                    <label>Nombre:</label>
                    <input type="text" id="nombre_paciente" name="nombre_paciente" placeholder="Ingresar primer nombre del paciente"> <!-- no conectar -->

                    <label>Apellido:</label>
                    <input type="text" id="apellido_paciente" name="apellido_paciente" placeholder="Ingresar primer apelldio del paciente"> <!-- no conectar -->

                    <label>Identificación paciente:</label>
                    <input type="number" id="id_paciente" name="id_paciente" placeholder="Ingresar numero de identidad del paciente">
                </fieldset>

                <fieldset>
                    <legend>Diagnóstico</legend>

                    <label>Diagnóstico principal:</label>
                    <input type="text" id="diagnostico_principal" name="diagnostico_principal" placeholder="CIE-10 código">

                    <label>Motivo de consulta:</label>
                    <input type="text" id="motivo_consulta" name="motivo_consulta" placeholder="Descripción del código CIE-10">
                </fieldset>

            </div>

            <div class="div-form">

                <fieldset>
                    <legend>Características de la Herida</legend>

                    <label>Largo:</label>
                    <input type="number" id="largo" name="largo" placeholder="Largo de la herida">

                    <label>Ancho:</label>
                    <input type="number" id="ancho" name="ancho" placeholder="Ancho de la herida">

                    <label for="profundidad">Profundidad de la herida:</label>
                    <select id="profundidad" name="profundidad">
                        <option value="Superficial">Superficial</option>
                        <option value="Parcial">Parcial</option>
                        <option value="Total">Total</option>
                        <option value="Penetrante">Penetrante</option>
                        <option value="Perforante">Perforante</option>
                    </select>

                    <label for="forma">Forma de la herida:</label>
                    <select id="forma" name="forma">
                        <option value="Circular">Circular</option>
                        <option value="Ovalada">Ovalada</option>
                        <option value="Lineal">Lineal</option>
                        <option value="Irregular">Irregular</option>
                        <option value="Estrellada">Estrellada</option>
                        <option value="Rectangular">Rectangular</option>
                        <option value="Triangular">Triangular</option>
                        <option value="Serpiginosa">Serpiginosa (con bordes ondulados)</option>
                        <option value="Geográfica">Geográfica (forma irregular con bordes complejos)</option>
                        <option value="Punctiforme">Punctiforme (pequeña y puntiforme)</option>
                    </select>

                    <label for="olor">Olor:</label>
                    <select id="olor" name="olor">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>

                    <label for="bordes_herida">Bordes de la herida:</label>
                    <select id="bordes_herida" name="bordes_herida">
                        <option value="Bien definidos">Bien definidos</option>
                        <option value="Mal definidos">Mal definidos</option>
                        <option value="Elevados">Elevados</option>
                        <option value="Desnivelados">Desnivelados</option>
                        <option value="Irregulares">Irregulares</option>
                        <option value="Evertidos">Evertidos (hacia afuera)</option>
                        <option value="Invertidos">Invertidos (hacia adentro)</option>
                        <option value="Escalonados">Escalonados</option>
                        <option value="Necrosados">Necrosados</option>
                        <option value="Indurados">Indurados (duros)</option>
                        <option value="Congestivos">Congestivos (hinchados y enrojecidos)</option>
                    </select>

                    <label for="infeccion">Infección de la herida:</label>
                    <select id="infeccion" name="infeccion">
                        <option value="Ninguna">Ninguna</option>
                        <option value="Local">Local</option>
                        <option value="Diseminada">Diseminada</option>
                    </select>


                    <label for="exudado_tipo">Tipo de exudado:</label>
                    <select id="exudado_tipo" name="exudado_tipo">
                        <option value="Ninguno">Ninguno</option>
                        <option value="Seroso">Seroso</option>
                        <option value="Sanguinolento">Sanguinolento</option>
                        <option value="Purulento">Purulento</option>
                        <option value="Fibrinoso">Fibrinoso</option>
                        <option value="Serosanguinolento">Serosanguinolento</option>
                        <option value="Hemorrágico">Hemorrágico</option>
                        <option value="Líquido linfático">Líquido linfático</option>
                        <option value="Mucopurulento">Mucopurulento</option>
                        <option value="Seropurulento">Seropurulento</option>
                        <option value="Necrosado">Necrosado</option>
                    </select>


                    <label for="exudado_nivel">Nivel de exudado:</label>
                    <select id="exudado_nivel" name="exudado_nivel">
                        <option value="Ninguno">Ninguno</option>
                        <option value="Bajo">Bajo</option>
                        <option value="Moderado">Moderado</option>
                        <option value="Alto">Alto</option>
                        <option value="Muy alto">Muy alto</option>
                    </select>

                </fieldset>

            </div>


            <div class="div-form">

                <fieldset>
                    <legend>Atención</legend>

                    <label>Fecha de atención:</label>
                    <input type="date" id="fecha_atencion" name="fecha_atencion">

                    <label>Hora de inicio:</label>
                    <input type="time" id="hora_inicio" name="hora_inicio">

                    <label>Hora de finalización:</label>
                    <input type="time" id="hora_final" name="hora_final">
                </fieldset>

            </div>

    </div>

            <div class="buttom-end">

                <ul>
                    <li><input type="submit" value="Guardar"></li>
                    <li><a href="../Consultar/index.php" class="menu-principal" target="_blank">Consultar</a></li>
                </ul>

            </div>


        </form>

</body>

</html>