<?php

// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se envió el formulario
if (isset($_POST['tipo_cita'])) {
    $tipo_cita = $_POST['tipo_cita'];
    $id_cita = $_POST['id_cita'] ?? null;
    $id_paciente = $_POST['id_paciente'] ?? null;
    $fecha_solicitud = $_POST['fecha_solicitud'] ?? null;
    $fecha_programada = $_POST['fecha_programada'] ?? null;
    $hora_programada = $_POST['hora_programada'] ?? null;

    // Determinar la tabla en la que se realizará la consulta
    if ($tipo_cita === 'consulta') {
        $tabla = 'cita_consulta';
    } elseif ($tipo_cita === 'procedimiento') {
        $tabla = 'cita_procedimiento';
    } else {
        echo "<tr><td colspan='5'>Tipo de cita inválido</td></tr>";
        exit;
    }

    // Construir la consulta SQL
    $sql = "SELECT * FROM $tabla WHERE 1=1";

    if ($id_cita) {
        $sql .= " AND id_cita = '$id_cita'";
    }

    if ($id_paciente) {
        $sql .= " AND id_paciente LIKE '$id_paciente%'";
    }

    if ($fecha_solicitud) {
        $sql .= " AND fecha_solicitud = '$fecha_solicitud'";
    }

    if ($fecha_programada) {
        $sql .= " AND fecha_programada = '$fecha_programada'";
    }

    if ($hora_programada) {
        $sql .= " AND hora_programada LIKE '$hora_programada%'";
    }

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Generar las filas de la tabla
        while ($row = $result->fetch_assoc()) {
                        
            echo "<tr>
                    <td>" . $row["id_cita"] . "</td>
                    <td>" . $row["id_paciente"] . "</td>
                    <td>" . $row["fecha_solicitud"] . "</td>
                    <td>" . $row["fecha_programada"] . "</td>
                    <td>" . $row["hora_programada"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
    }
}

// Cerrar la conexión
$mysqli->close();
?>
