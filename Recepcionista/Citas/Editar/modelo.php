<?php

// Obtener los datos de la cita a editar
$id_cita = $_GET['id_cita'] ?? null;
$id_paciente = $_GET['id_paciente'] ?? null;
$fecha_solicitud = $_GET['fecha_solicitud'] ?? null;
$fecha_programada = $_GET['fecha_programada'] ?? null;
$hora_programada = $_GET['hora_programada'] ?? null;
$tipo_cita = $_GET['tipo_cita'] ?? null; // Nuevo campo para el tipo de cita

// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Configurar MySQLi para lanzar excepciones
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Verificar si se recibió el formulario de actualización
    if (isset($_POST['actualizar'])) {
        $id_cita = $_POST['id_cita'];
        $id_paciente = $_POST['id_paciente'];
        $fecha_solicitud = $_POST['fecha_solicitud'];
        $fecha_programada = $_POST['fecha_programada'];
        $hora_programada = $_POST['hora_programada'];
        $tipo_cita = $_POST['tipo_cita']; // Nuevo campo para el tipo de cita

        // Determinar la tabla en la que se realizará la actualización
        if ($tipo_cita === 'consulta') {
            $tabla = 'cita_consulta';
        } elseif ($tipo_cita === 'procedimiento') {
            $tabla = 'cita_procedimiento';
        } else {
            die("Tipo de cita inválido");
        }

        // Realizar la actualización en la base de datos
        $sql = "UPDATE $tabla SET 
                id_paciente = '$id_paciente',
                fecha_solicitud = '$fecha_solicitud',
                fecha_programada = '$fecha_programada',
                hora_programada = '$hora_programada'
                WHERE id_cita = '$id_cita'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Cita actualizada exitosamente');
                    window.close();
                </script>";
        }
    }

    // Verificar si se recibió el formulario de eliminación
    if (isset($_POST['eliminar'])) {
        $id_cita = $_POST['id_cita'];
        $tipo_cita = $_POST['tipo_cita']; // Nuevo campo para el tipo de cita

        // Determinar la tabla en la que se realizará la actualización
        if ($tipo_cita === 'consulta') {
            $tabla = 'cita_consulta';
        } elseif ($tipo_cita === 'procedimiento') {
            $tabla = 'cita_procedimiento';
        } else {
            die("Tipo de cita inválido");
        }


        // Realizar la eliminación en la base de datos
        $sql = "DELETE FROM $tabla WHERE id_cita = '$id_cita'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Cita eliminada exitosamente');
                    window.close();
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