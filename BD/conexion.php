<?php
$servername = "mysql.railway.internal";
$username = "root";
$password = "DTElHoDhuKKoAPtNkelfZsUAaRIMtbfO";
$dbname = "railway";
$port = 3306;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}

$conn->close();
?>
