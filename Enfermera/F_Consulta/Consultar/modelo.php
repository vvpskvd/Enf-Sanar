<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se envió el formulario
if (isset($_POST['id_consulta'])) {
    $id_consulta = $_POST['id_consulta'] ?? null;
    $id_cita = $_POST['id_cita'] ?? null;
    $id_enfermera = $_POST['id_enfermera'] ?? null;
    $id_paciente = $_POST['id_paciente'] ?? null;
    $diagnostico_principal = $_POST['diagnostico_principal'] ?? null;
    $fecha_atencion = $_POST['fecha_atencion'] ?? null;
    $hora_inicio = $_POST['hora_inicio'] ?? null;
    $hora_final = $_POST['hora_final'] ?? null;

    // Construir la consulta SQL
    $sql = "SELECT * FROM consulta WHERE 1=1";

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

    if ($diagnostico_principal) {
        $sql .= " AND diagnostico_principal LIKE '%$diagnostico_principal%'";
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

                'id_consulta' => $row['id_consulta'],
                'id_cita' => $row['id_cita'],
                'id_enfermera' => $row['id_enfermera'],
                'id_paciente' => $row['id_paciente'],
                'diagnostico_principal' => $row['diagnostico_principal'],
                'motivo_consulta' => $row['motivo_consulta'],
                'largo' => $row['largo'],
                'ancho' => $row['ancho'],
                'profundidad' => $row['profundidad'],
                'forma' => $row['forma'],
                'olor' => $row['olor'],
                'bordes_herida' => $row['bordes_herida'],
                'infeccion' => $row['infeccion'],
                'exudado_tipo' => $row['exudado_tipo'],
                'exudado_nivel' => $row['exudado_nivel'],
                'fecha_atencion' => $row['fecha_atencion'],
                'hora_inicio' => $row['hora_inicio'],
                'hora_final' => $row['hora_final'],


            ];

            $query_string = http_build_query($params);

            $editLink = "<a href='../editar/index.php?$query_string' style='color: black; text-decoration: none;'>            </a>";

            echo "<tr>
                    <td>" . $row["id_consulta"] . "</td>
                    <td>" . $row["id_cita"] . "</td>
                    <td>" . $row["id_enfermera"] . "</td>
                    <td>" . $row["id_paciente"] . "</td>
                    <td>" . $row["diagnostico_principal"] . "</td>
                    <td>" . $row["motivo_consulta"] . "</td>
                    <td>" . $row["largo"] . "</td>
                    <td>" . $row["ancho"] . "</td>
                    <td>" . $row["profundidad"] . "</td>
                    <td>" . $row["forma"] . "</td>
                    <td>" . $row["olor"] . "</td>
                    <td>" . $row["bordes_herida"] . "</td>
                    <td>" . $row["infeccion"] . "</td>
                    <td>" . $row["exudado_tipo"] . "</td>
                    <td>" . $row["exudado_nivel"] . "</td>
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
