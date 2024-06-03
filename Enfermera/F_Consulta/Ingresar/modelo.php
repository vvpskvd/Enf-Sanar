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

    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
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

        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO consulta (id_cita, id_enfermera, id_paciente, diagnostico_principal, motivo_consulta, largo, ancho, profundidad, forma, olor, bordes_herida, infeccion, exudado_tipo, exudado_nivel, fecha_atencion, hora_inicio, hora_final) 
                VALUES ('$id_cita', '$id_enfermera', '$id_paciente', '$diagnostico_principal', '$motivo_consulta', '$largo', '$ancho', '$profundidad', '$forma', '$olor', '$bordes_herida', '$infeccion', '$exudado_tipo', '$exudado_nivel', '$fecha_atencion', '$hora_inicio', '$hora_final')";

        // Ejecutar la consulta
        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Consulta Médica registrada exitosamente');
                    window.location.href = '../../../enfermera/index.php';
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