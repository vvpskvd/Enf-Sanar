<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se envió el formulario de registro de estudiantes
if (
    isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo_documento'])
    && isset($_POST['identificacion']) && isset($_POST['telefono']) && isset($_POST['nacionalidad']) && isset($_POST['direccion'])
    && isset($_POST['barrio']) && isset($_POST['municipio']) && isset($_POST['fecha_nacimiento']) && isset($_POST['sexo'])
    && isset($_POST['tipo_sangre']) && isset($_POST['correo']) && isset($_POST['ocupacion']) && isset($_POST['entidad'])
    && isset($_POST['estado_civil']) && isset($_POST['comorbilidades'])
) {

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['telefono'];
    $nacionalidad = $_POST['nacionalidad'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $municipio = $_POST['municipio'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];
    $tipo_sangre = $_POST['tipo_sangre'];
    $correo = $_POST['correo'];
    $ocupacion = $_POST['ocupacion'];
    $entidad = $_POST['entidad'];
    $estado_civil = $_POST['estado_civil'];
    $comorbilidades = $_POST['comorbilidades'];

    // Preparar y ejecutar la consulta SQL para insertar el estudiante
    $sql = "INSERT INTO paciente (nombre, apellido, tipo_documento, identificacion, telefono, nacionalidad, direccion, 
    barrio, municipio, fecha_nacimiento, sexo, tipo_sangre, correo, ocupacion, entidad, estado_civil, comorbilidades) 
            VALUES ('$nombre', '$apellido', '$tipo_documento', '$identificacion', '$telefono', '$nacionalidad', '$direccion', 
            '$barrio', '$municipio', '$fecha_nacimiento', '$sexo', '$tipo_sangre', '$correo', '$ocupacion', '$entidad', 
            '$estado_civil', '$comorbilidades')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>
                alert('Paciente registrado exitosamente');
                window.location.href = '../../../recepcionista/index.php';
            </script>";
    } else {
        echo "<script>
                alert('Error al registrar el paciente: " . $mysqli->error . "');
            </script>";
    }
}

// Cerrar la conexión
$mysqli->close();
