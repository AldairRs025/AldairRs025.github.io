<?php
$conexion = new mysqli("localhost", "root", "", "tutorías");
$conexion->set_charset("utf8");
if ($conexion->connect_error) die("Conexión fallida: " . $conexion->connect_error);

$prescripcion = $_POST['prescripcion'];
$deficiencia = is_array($_POST['deficiencia']) ? implode(",", $_POST['deficiencia']) : $_POST['deficiencia'];
$observaciones = $_POST['observaciones_higiene'];

$sql = "INSERT INTO datos_medicos (prescripcion, deficiencia, observaciones_higiene) 
VALUES ('$prescripcion', '$deficiencia', '$observaciones')";

echo $conexion->query($sql) === TRUE ? "Datos médicos registrados correctamente." : "Error: $sql\n" . $conexion->error;
$conexion->close();
?>