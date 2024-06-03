<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Verificar si se envió el formulario
    if (
        isset($_POST['id_paciente']) && isset($_POST['fecha_solicitud']) && isset($_POST['fecha_programada'])
        && isset($_POST['hora_programada']) && isset($_POST['tipo'])
    ) {

        // Obtener los datos del formulario
        $id_paciente = $_POST['id_paciente'];
        $fecha_solicitud = $_POST['fecha_solicitud'];
        $fecha_programada = $_POST['fecha_programada'];
        $hora_programada = $_POST['hora_programada'];
        $tipo = $_POST['tipo'];

        // Determinar la tabla en la que se insertarán los datos
        if ($tipo === 'consulta') {
            $tabla = 'cita_consulta';
        } elseif ($tipo === 'procedimiento') {
            $tabla = 'cita_procedimiento';
        } else {
            echo "<script>
                    alert('Tipo inválido. Debe ser consulta o procedimiento');
                    window.history.back();
                </script>";
            exit;
        }

        // Preparar y ejecutar la consulta SQL para insertar los datos
        $sql = "INSERT INTO $tabla (id_paciente, fecha_solicitud, fecha_programada, hora_programada) 
                VALUES ('$id_paciente', '$fecha_solicitud', '$fecha_programada', '$hora_programada')";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Cita registrada exitosamente');
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

