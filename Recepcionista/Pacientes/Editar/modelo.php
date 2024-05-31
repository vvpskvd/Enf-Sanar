<?php

// Obtener los datos del paciente a editar
$identificacion = $_GET['identificacion'] ?? null;
$nombre = $_GET['nombre'] ?? null;
$apellido = $_GET['apellido'] ?? null;
$telefono = $_GET['telefono'] ?? null;
$direccion = $_GET['direccion'] ?? null;
$barrio = $_GET['barrio'] ?? null;
$correo = $_GET['correo'] ?? null;
$ocupacion = $_GET['ocupacion'] ?? null;
$entidad = $_GET['entidad'] ?? null;
$estado_civil = $_GET['estado_civil'] ?? null;

// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se recibió el formulario de actualización
if (isset($_POST['actualizar'])) {
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $correo = $_POST['correo'];
    $ocupacion = $_POST['ocupacion'];
    $entidad = $_POST['entidad'];
    $estado_civil = $_POST['estado_civil'];

    // Realizar la actualización en la base de datos
    $sql = "UPDATE paciente SET 
            nombre = '$nombre',
            apellido = '$apellido',
            telefono = '$telefono',
            direccion = '$direccion',
            barrio = '$barrio',
            correo = '$correo',
            ocupacion = '$ocupacion',
            entidad = '$entidad',
            estado_civil = '$estado_civil'
            WHERE identificacion = '$identificacion'";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>
                alert('Datos del paciente actualizados exitosamente');
                window.location.href = '../../../recepcionista/index.php';
            </script>";
    } else {
        echo "<script>
                alert('Error al actualizar los datos del paciente: " . $mysqli->error . "');
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
                window.location.href = '../../../recepcionista/index.php';
            </script>";
    } else {
        echo "<script>
                alert('Error al eliminar el paciente: " . $mysqli->error . "');
            </script>";
    }
}

// Cerrar la conexión
$mysqli->close();
?>


