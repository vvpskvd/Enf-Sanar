<?php

// Obtener los datos del paciente a editar
$identificacion = $_GET['identificacion'] ?? null;
$tipo_documento = $_GET['tipo_documento'] ?? null;
$nombre = $_GET['nombre'] ?? null;
$apellido = $_GET['apellido'] ?? null;
$telefono = $_GET['telefono'] ?? null;
$direccion = $_GET['direccion'] ?? null;
$barrio = $_GET['barrio'] ?? null;
$fecha_nacimiento = $_GET['fecha_nacimiento'] ?? null;
$sexo = $_GET['sexo'] ?? null;
$tipo_sangre = $_GET['tipo_sangre'] ?? null;
$correo = $_GET['correo'] ?? null;
$ocupacion = $_GET['ocupacion'] ?? null;
$entidad = $_GET['entidad'] ?? null;
$estado_civil = $_GET['estado_civil'] ?? null;

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
        $identificacion = $_POST['identificacion'];
        $tipo_documento = $_POST['tipo_documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
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

        // Realizar la actualización en la base de datos
        $sql = "UPDATE paciente SET 
                tipo_documento = '$tipo_documento',
                nombre = '$nombre',
                apellido = '$apellido',
                telefono = '$telefono',
                direccion = '$direccion',
                barrio = '$barrio',
                fecha_nacimiento = '$fecha_nacimiento',
                sexo= '$sexo',
                tipo_sangre = '$tipo_sangre',
                correo = '$correo',
                ocupacion = '$ocupacion',
                entidad = '$entidad',
                estado_civil = '$estado_civil'
                WHERE identificacion = '$identificacion'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Datos del paciente actualizados exitosamente');
                    window.close()
                </script>";
        }
    }

    // Verificar si se recibió el formulario de eliminación
    if (isset($_POST['eliminar'])) {
        $identificacion = $_POST['identificacion'];

        // Realizar la eliminación en la base de datos
        $sql = "DELETE FROM paciente WHERE identificacion = '$identificacion'";

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>
                    alert('Paciente eliminado exitosamente');
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


