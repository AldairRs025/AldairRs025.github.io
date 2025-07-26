<?php
$conexion = new mysqli("localhost", "root", "", "tutorías");
$conexion->set_charset("utf8");
if ($conexion->connect_error) die("Conexión fallida: " . $conexion->connect_error);

$campos = ['relacion_companeros', 'porque_relacion_companeros', 'relacion_amigos', 'tiene_pareja',
'relacion_pareja', 'relacion_profesores', 'relacion_autoridades', 'tiempo_libre', 'actividad_recreativa'];

foreach ($campos as $campo) $$campo = $_POST[$campo];

$sql = "INSERT INTO caracteristicas_personales (relacion_companeros, porque_relacion_companeros, relacion_amigos,
tiene_pareja, relacion_pareja, relacion_profesores, relacion_autoridades, tiempo_libre, actividad_recreativa)
VALUES ('$relacion_companeros', '$porque_relacion_companeros', '$relacion_amigos', '$tiene_pareja',
'$relacion_pareja', '$relacion_profesores', '$relacion_autoridades', '$tiempo_libre', '$actividad_recreativa')";

echo $conexion->query($sql) === TRUE ? "Características personales registradas correctamente." : "Error: $sql\n" . $conexion->error;
$conexion->close();
?>