<?php
// Conexión a la base de datos
$mysqli = new mysqli('127.0.0.1', 'root', '', 'enfsanar');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar si se envió el formulario
if (isset($_POST['identificacion'])) {
    $identificacion = $_POST['identificacion'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
    $telefono = $_POST['telefono'] ?? null;
    $correo = $_POST['correo'] ?? null;

    // Construir la consulta SQL
    $sql = "SELECT * FROM paciente WHERE 1=1";

    if ($identificacion) {
        $sql .= " AND identificacion LIKE '%$identificacion%'";
    }

    if ($nombre) {
        $sql .= " AND nombre LIKE '%$nombre%'";
    }

    if ($apellido) {
        $sql .= " AND apellido LIKE '%$apellido%'";
    }

    
    if ($fecha_nacimiento) {
        $sql .= " AND fecha_nacimiento = '$fecha_nacimiento'";
    }

    if ($telefono) {
        $sql .= " AND telefono LIKE '%$telefono%'";
    }

    if ($correo) {
        $sql .= " AND correo LIKE '%$correo%'";
    }

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Generar las filas de la tabla
        while ($row = $result->fetch_assoc()) {

            $params = [

                'identificacion' => $row['identificacion'],
                'tipo_documento' => $row['tipo_documento'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'direccion' => $row['direccion'],
                'barrio' => $row['barrio'],
                'fecha_nacimiento' => $row['fecha_nacimiento'],
                'sexo' => $row['sexo'],
                'tipo_sangre' => $row['tipo_sangre'],
                'correo' => $row['correo'],
                'ocupacion' => $row['ocupacion'],
                'entidad' => $row['entidad'],
                'estado_civil' => $row['estado_civil'],

            ];

            $query_string = http_build_query($params);

            $editLink = "<a href='../editar/index.php?$query_string' style='color: black; text-decoration: none;'>            </a>";

            echo "<tr>
                    <td>" . $row["identificacion"] . "</td>
                    <td>" . $row["tipo_documento"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["apellido"] . "</td>
                    <td>" . $row["telefono"] . "</td>
                    <td>" . $row["direccion"] . "</td>
                    <td>" . $row["barrio"] . "</td>
                    <td>" . $row["fecha_nacimiento"] . "</td>
                    <td>" . $row["sexo"] . "</td>
                    <td>" . $row["tipo_sangre"] . "</td>
                    <td>" . $row["correo"] . "</td>
                    <td>" . $row["ocupacion"] . "</td>
                    <td>" . $row["entidad"] . "</td>
                    <td>" . $row["estado_civil"] . "</td>
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
