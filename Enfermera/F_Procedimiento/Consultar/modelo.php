<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se envió el formulario
if (isset($_POST['id_procedimiento'])) {
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


    // Construir la consulta SQL
    $sql = "SELECT * FROM procedimiento WHERE 1=1";

    if ($id_procedimiento) {
        $sql .= " AND id_procedimiento LIKE '%$id_procedimiento%'";
    }

    if ($id_consulta) {
        $sql .= " AND id_consulta LIKE '%$id_consulta%'";
    }
    
    if ($id_cita) {
        $sql .= " AND id_cita LIKE '%$id_cita%'";
    }
    
    if ($id_enfermera) {
        $sql .= " AND id_enfermera LIKE '%$id_enfermera%'";
    }
    
    if ($id_paciente) {
        $sql .= " AND id_paciente LIKE '%$id_paciente%'";
    }
    
    if ($analisis) {
        $sql .= " AND analisis LIKE '%$analisis%'";
    }
    
    if ($evolucion) {
        $sql .= " AND evolucion LIKE '%$evolucion%'";
    }
    
    if ($plan_de_cuidado) {
        $sql .= " AND plan_de_cuidado LIKE '%$plan_de_cuidado%'";
    }
    
    if ($recomendacion) {
        $sql .= " AND recomendacion LIKE '%$recomendacion%'";
    }
    
    if ($finalidad_procedimiento) {
        $sql .= " AND finalidad_procedimiento LIKE '%$finalidad_procedimiento%'";
    }
    
    if ($cups) {
        $sql .= " AND cups LIKE '%$cups%'";
    }
    
    if ($fecha_atencion) {
        $sql .= " AND fecha_atencion LIKE '%$fecha_atencion%'";
    }
    
    if ($hora_inicio) {
        $sql .= " AND hora_inicio LIKE '%$hora_inicio%'";
    }
    
    if ($hora_final) {
        $sql .= " AND hora_final LIKE '%$hora_final%'";
    }

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Generar las filas de la tabla
        while ($row = $result->fetch_assoc()) {

            $params = [
                'id_procedimiento' => $row['id_procedimiento'],
                'id_consulta' => $row['id_consulta'],
                'id_cita' => $row['id_cita'],
                'id_enfermera' => $row['id_enfermera'],
                'id_paciente' => $row['id_paciente'],
                'analisis' => $row['analisis'],
                'evolucion' => $row['evolucion'],
                'plan_de_cuidado' => $row['plan_de_cuidado'],
                'recomendacion' => $row['recomendacion'],
                'finalidad_procedimiento' => $row['finalidad_procedimiento'],
                'cups' => $row['cups'],
                'fecha_atencion' => $row['fecha_atencion'],
                'hora_inicio' => $row['hora_inicio'],
                'hora_final' => $row['hora_final'],

            ];

            $query_string = http_build_query($params);

            $editLink = "<a href='../editar/index.php?$query_string' style='color: black; text-decoration: none;'>            </a>";

            echo "<tr>
                    <td>" . $row["id_procedimiento"] . "</td>
                    <td>" . $row["id_consulta"] . "</td>
                    <td>" . $row["id_cita"] . "</td>
                    <td>" . $row["id_enfermera"] . "</td>
                    <td>" . $row["id_paciente"] . "</td>
                    <td>" . $row["analisis"] . "</td>
                    <td>" . $row["evolucion"] . "</td>
                    <td>" . $row["plan_de_cuidado"] . "</td>
                    <td>" . $row["recomendacion"] . "</td>
                    <td>" . $row["finalidad_procedimiento"] . "</td>
                    <td>" . $row["cups"] . "</td>
                    <td>" . $row["fecha_atencion"] . "</td>
                    <td>" . $row["hora_inicio"] . "</td>
                    <td>" . $row["hora_final"] . "</td>
                    <td>$editLink</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
    }
}

// Cerrar la conexión
$mysqli->close();
?>
