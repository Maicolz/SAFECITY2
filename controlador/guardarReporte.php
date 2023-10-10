<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "safecity";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}



// Recibe los datos del tipo de reporte, las coordenadas y la fecha
$latitud = $_POST['latitud'];
$logintud = $_POST['logintud'];
$IDreporte = $_POST['IDreporte'];
$fecha = $_POST['fecha'];

// Escapa los datos para evitar inyecciones de SQL
$latitud = mysqli_real_escape_string($conn, $latitud);
$logintud = mysqli_real_escape_string($conn, $logintud);
$IDreporte = mysqli_real_escape_string($conn, $IDreporte);
$fecha = mysqli_real_escape_string($conn, $fecha);

// Inserta los datos en la base de datos
$sql = "INSERT INTO reportes (latitud, logintud,  FechaReporte , IdTipoReporte ) VALUES ('$latitud', '$logintud', '$fecha' ,'$IDreporte')";



if ($conn->query($sql) === TRUE) {
    echo "SU REPORTE HA SIDO ENVIADO , JUNTOS PODEMOS LUCHAR CONTRA LA INSEGURIDAD ";
} else {
    echo "Error al guardar el reporte: " . $conn->error;
}

$conn->close();
?>
