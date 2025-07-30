<?php
include('conexion.php');

$matricula = $_POST['matricula'];
$rol = $_POST['rol'];
$carrera = $_POST['carrera'];
$contrasena = $_POST['contrasena'];

$sql = "UPDATE login SET rol='$rol', carrera='$carrera'";
if (!empty($contrasena)) {
    $sql .= ", contrasena='$contrasena'";
}
$sql .= " WHERE matricula='$matricula'";

if ($conn->query($sql) === TRUE) {
    header("Location: tutor.php");
} else {
    echo "Error al actualizar: " . $conn->error;
}
$conn->close();
?>