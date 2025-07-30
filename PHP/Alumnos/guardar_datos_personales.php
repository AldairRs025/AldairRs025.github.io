<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorías";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$estatura = $_POST['estatura'];
$carrera = $_POST['carrera'];
$peso = $_POST['peso'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];
$estado_civil = $_POST['estado_civil'];
$trabaja = $_POST['trabaja'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$domicilio_actual = $_POST['domicilio_actual'];
$telefono = $_POST['telefono'];
$cp = $_POST['cp'];
$email = $_POST['email'];

// Insertar en la base de datos
$sql = "INSERT INTO datos_personales (nombre, estatura, carrera, peso, fecha_nacimiento, sexo, edad, estado_civil, trabaja, lugar_nacimiento, domicilio_actual, telefono, cp, email)
VALUES ('$nombre', '$estatura', '$carrera', '$peso', '$fecha_nacimiento', '$sexo', '$edad', '$estado_civil', '$trabaja', '$lugar_nacimiento', '$domicilio_actual', '$telefono', '$cp', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>