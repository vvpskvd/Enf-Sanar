<?php
// Obtener los datos del paciente a editar
$id_consulta = $_GET['id_consulta'] ?? null;
$id_cita = $_GET['id_cita'] ?? null;
$id_enfermera = $_GET['id_enfermera'] ?? null;
$id_paciente = $_GET['id_paciente'] ?? null;
$diagnostico_principal = $_GET['diagnostico_principal'] ?? null;
$motivo_consulta = $_GET['motivo_consulta'] ?? null;
$largo = $_GET['largo'] ?? null;
$ancho = $_GET['ancho'] ?? null;
$profundidad = $_GET['profundidad'] ?? null;
$forma = $_GET['forma'] ?? null;
$olor = $_GET['olor'] ?? null;
$bordes_herida = $_GET['bordes_herida'] ?? null;
$infeccion = $_GET['infeccion'] ?? null;
$exudado_tipo = $_GET['exudado_tipo'] ?? null;
$exudado_nivel = $_GET['exudado_nivel'] ?? null;
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
        $id_consulta = $_POST['id_consulta'];
        $id_cita = $_POST['id_cita'];
        $id_enfermera = $_POST['id_enfermera'];
        $id_paciente = $_POST['id_paciente'];
        $diagnostico_principal = $_POST['diagnostico_principal'];
        $motivo_consulta = $_POST['motivo_consulta'];
        $largo = $_POST['largo'];
        $ancho = $_POST['ancho'];
        $profundidad = $_POST['profundidad'];
        $forma = $_POST['forma'];
        $olor = $_POST['olor'];
        $bordes_herida = $_POST['bordes_herida'];
        $infeccion = $_POST['infeccion'];
        $exudado_tipo = $_POST['exudado_tipo'];
        $exudado_nivel = $_POST['exudado_nivel'];
        $fecha_atencion = $_POST['fecha_atencion'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_final = $_POST['hora_final'];

        // Realizar la actualización en la base de datos
        $sql = "UPDATE consulta SET 
        id_cita = '$id_cita',
        id_enfermera = '$id_enfermera',
        id_paciente = '$id_paciente',
        diagnostico_principal = '$diagnostico_principal',
        motivo_consulta = '$motivo_consulta',
        largo = '$largo',
        ancho = '$ancho',
        profundidad = '$profundidad',
        forma = '$forma',
        olor = '$olor',
        bordes_herida = '$bordes_herida',
        infeccion = '$infeccion',
        exudado_tipo = '$exudado_tipo',
        exudado_nivel = '$exudado_nivel',
        fecha_atencion = '$fecha_atencion',
        hora_inicio = '$hora_inicio',
        hora_final = '$hora_final'
        WHERE id_consulta = '$id_consulta'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Datos de la consulta médica actualizados exitosamente');
                    window.close();
            </script>";
        }
    }

    // Verificar si se recibió el formulario de eliminación
    if (isset($_POST['eliminar'])) {
        $id_consulta = $_POST['id_consulta'];

        // Realizar la eliminación en la base de datos
        $sql = "DELETE FROM consulta WHERE id_consulta = '$id_consulta'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Consulta médica eliminada exitosamente');
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
