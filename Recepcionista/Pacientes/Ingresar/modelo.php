<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Configurar MySQLi para lanzar excepciones
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Verificar si se envió el formulario de registro de estudiantes
    if (
        isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo_documento'])
        && isset($_POST['identificacion']) && isset($_POST['telefono']) && isset($_POST['direccion'])
        && isset($_POST['barrio']) && isset($_POST['fecha_nacimiento']) && isset($_POST['sexo'])
        && isset($_POST['tipo_sangre']) && isset($_POST['correo']) && isset($_POST['ocupacion']) && isset($_POST['entidad'])
        && isset($_POST['estado_civil'])
    ) {

        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipo_documento = $_POST['tipo_documento'];
        $identificacion = $_POST['identificacion'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $sexo = $_POST['sexo'];
        $tipo_sangre = $_POST['tipo_sangre'];
        $correo = $_POST['correo'];
        $ocupacion = $_POST['ocupacion'];
        $entidad = $_POST['entidad'];
        $estado_civil = $_POST['estado_civil'];

        // Preparar y ejecutar la consulta SQL para insertar el estudiante
        $sql = "INSERT INTO paciente (nombre, apellido, tipo_documento, identificacion, telefono, direccion, 
        barrio, fecha_nacimiento, sexo, tipo_sangre, correo, ocupacion, entidad, estado_civil) 
                VALUES ('$nombre', '$apellido', '$tipo_documento', '$identificacion', '$telefono', '$direccion', 
                '$barrio', '$fecha_nacimiento', '$sexo', '$tipo_sangre', '$correo', '$ocupacion', '$entidad', 
                '$estado_civil')";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Paciente registrado exitosamente');
                    window.location.href = '../../../recepcionista/index.php';
                </script>";
        }
    }

} catch (Exception $e) {
    // Mostrar mensaje genérico al usuario
    echo "<script>
            alert('Ocurrió un error al procesar la solicitud.');
            window.history.back();
        </script>";
} finally {
    // Cerrar la conexión
    $mysqli->close();
}