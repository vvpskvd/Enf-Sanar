<?php

$id_procedimiento = $_GET['id_procedimiento'] ?? null;
$id_consulta = $_GET['id_consulta'] ?? null;
$id_cita = $_GET['id_cita'] ?? null;
$id_enfermera = $_GET['id_enfermera'] ?? null;
$id_paciente = $_GET['id_paciente'] ?? null;
$analisis = $_GET['analisis'] ?? null;
$evolucion = $_GET['evolucion'] ?? null;
$plan_de_cuidado = $_GET['plan_de_cuidado'] ?? null;
$recomendacion = $_GET['recomendacion'] ?? null;
$finalidad_procedimiento = $_GET['finalidad_procedimiento'] ?? null;
$cups = $_GET['cups'] ?? null;
$fecha_atencion = $_GET['fecha_atencion'] ?? null;
$hora_inicio = $_GET['hora_inicio'] ?? null;
$hora_final = $_GET['hora_final'] ?? null;

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
        $id_procedimiento = $_POST['id_procedimiento'] ?? null;
        $id_consulta = $_POST['id_consulta'] ?? null;
        $id_cita = $_POST['id_cita'] ?? null;
        $id_enfermera = $_POST['id_enfermera'] ?? null;
        $id_paciente = $_POST['id_paciente'] ?? null;
        $analisis = $_POST['analisis'] ?? null;
        $evolucion = $_POST['evolucion'] ?? null;
        $plan_de_cuidado = $_POST['plan_de_cuidado'] ?? null;
        $recomendacion = $_POST['recomendacion'] ?? null;
        $finalidad_procedimiento = $_POST['finalidad_procedimiento'] ?? null;
        $cups = $_POST['cups'] ?? null;
        $fecha_atencion = $_POST['fecha_atencion'] ?? null;
        $hora_inicio = $_POST['hora_inicio'] ?? null;
        $hora_final = $_POST['hora_final'] ?? null;

        // Realizar la actualización en la base de datos
        $sql = "UPDATE procedimiento SET
        id_consulta = '$id_consulta',
        id_cita = '$id_cita',
        id_enfermera = '$id_enfermera',
        id_paciente = '$id_paciente',
        analisis = '$analisis',
        evolucion = '$evolucion',
        plan_de_cuidado = '$plan_de_cuidado',
        recomendacion = '$recomendacion',
        finalidad_procedimiento = '$finalidad_procedimiento',
        cups = '$cups',
        fecha_atencion = '$fecha_atencion',
        hora_inicio = '$hora_inicio',
        hora_final = '$hora_final'
        WHERE id_procedimiento = '$id_procedimiento'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Datos del procedimiento médico actualizados exitosamente');
                    window.close();
                </script>";
        }
    }

    // Verificar si se recibió el formulario de eliminación
    if (isset($_POST['eliminar'])) {
        $id_procedimiento = $_POST['id_procedimiento'];

        // Realizar la eliminación en la base de datos
        $sql = "DELETE FROM procedimiento WHERE id_procedimiento = '$id_procedimiento'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Procedimiento médico eliminado exitosamente');
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



