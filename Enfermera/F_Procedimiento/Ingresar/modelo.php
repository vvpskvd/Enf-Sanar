<?php
// Datos de conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Configurar MySQLi para lanzar excepciones
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir datos del formulario
        $id_cita = $_POST['id_cita'];
        $id_consulta = $_POST['id_consulta'];
        $id_enfermera = $_POST['id_enfermera'];
        $id_paciente = $_POST['id_paciente'];
        $analisis = $_POST['analisis'];
        $evolucion = $_POST['evolucion'];
        $plan_de_cuidado = $_POST['plan_de_cuidado'];
        $recomendacion = $_POST['recomendacion'];
        $finalidad_procedimiento = $_POST['finalidad_procedimiento'];
        $fecha_atencion = $_POST['fecha_atencion'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_final = $_POST['hora_final'];
        $cups = $_POST['cups'];

        // Consulta SQL para insertar los datos en la tabla procedimiento
        $sql = "INSERT INTO procedimiento (id_cita, id_consulta, id_enfermera, id_paciente, analisis, evolucion, plan_de_cuidado, recomendacion, 
    finalidad_procedimiento, cups, fecha_atencion, hora_inicio, hora_final)
    VALUES ('$id_cita', '$id_consulta', '$id_enfermera', '$id_paciente', '$analisis', '$evolucion', '$plan_de_cuidado', '$recomendacion', 
    '$finalidad_procedimiento', '$cups', '$fecha_atencion', '$hora_inicio', '$hora_final')";

        // Ejecutar la consulta
        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Procedimiento registrado exitosamente');
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