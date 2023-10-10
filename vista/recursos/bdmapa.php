<?php
// Conecta a la base de datos (reemplaza con tus credenciales)
$mysqli = new mysqli("localhost:3306", "root", "", "safecity");

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Consulta para obtener datos de la base de datos
$consulta = "SELECT latitud, logintud,IdTipoReporte FROM reportes";
$result = $mysqli->query($consulta);

// Crea un array para almacenar los datos
$marcadores = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $marcadores[] = $row;
    }
}

// Codifica los datos como JSON y devuelve
echo json_encode($marcadores);

// Cierra la conexión
$mysqli->close();
?>