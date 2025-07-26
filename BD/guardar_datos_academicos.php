<?php
$conexion = new mysqli("localhost", "root", "", "tutorías");
$conexion->set_charset("utf8");
if ($conexion->connect_error) die("Conexión fallida: " . $conexion->connect_error);

$sql = "INSERT INTO datos_academicos (primaria_nombre, primaria_ubicacion, secundaria_nombre, secundaria_ubicacion,
    bachillerato_nombre, bachillerato_ubicacion, superiores_nombre, superiores_ubicacion)
VALUES (
    '{$_POST['primaria_nombre']}', '{$_POST['primaria_ubicacion']}',
    '{$_POST['secundaria_nombre']}', '{$_POST['secundaria_ubicacion']}',
    '{$_POST['bachillerato_nombre']}', '{$_POST['bachillerato_ubicacion']}',
    '{$_POST['superiores_nombre']}', '{$_POST['superiores_ubicacion']}'
)";

echo $conexion->query($sql) === TRUE ? "Datos académicos registrados correctamente." : "Error: $sql\n" . $conexion->error;
$conexion->close();
?>