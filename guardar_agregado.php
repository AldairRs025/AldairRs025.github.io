<?php
include('conexion.php');

$matricula = $_POST['matricula'];
$rol = $_POST['rol'];
$carrera = $_POST['carrera'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO login (matricula, rol, carrera, contrasena) VALUES ('$matricula', '$rol', '$carrera', '$contrasena')";
if ($conn->query($sql) === TRUE) {
    header("Location: tutor.php");
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>