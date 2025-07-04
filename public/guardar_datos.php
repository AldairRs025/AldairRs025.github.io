<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conexion = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

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
$tipo_vivienda = implode(",", $_POST['vivienda'] ?? []);
$tipo_vivienda_propiedad = implode(",", $_POST['tipo'] ?? []);
$tipo_otro = $_POST['tipo_otro'];
$num_personas = $_POST['num_personas'];
$parentesco = $_POST['parentesco'];
$nombre_padre = $_POST['nombre_padre'];
$edad_padre = $_POST['edad_padre'];
$trabaja_padre = implode(",", $_POST['trabaja_padre'] ?? []);
$profesion_padre = $_POST['profesion_padre'];
$tipo_trabajo_padre = $_POST['tipo_trabajo_padre'];
$domicilio_padre = $_POST['domicilio_padre'];
$telefono_padre = $_POST['telefono_padre'];
$nombre_madre = $_POST['nombre_madre'];
$profesion_madre = $_POST['profesion_madre'];
$tipo_trabajo_madre = $_POST['tipo_trabajo_madre'];
$domicilio_madre = $_POST['domicilio_madre'];
$telefono_madre = $_POST['telefono_madre'];

$sql = "INSERT INTO contador_publico (
    nombre, estatura, carrera, peso, fecha_nacimiento, sexo, edad, estado_civil, trabaja,
    lugar_nacimiento, domicilio_actual, telefono, cp, email, tipo_vivienda, tipo_vivienda_propiedad,
    tipo_otro, num_personas, parentesco, nombre_padre, edad_padre, trabaja_padre, profesion_padre,
    tipo_trabajo_padre, domicilio_padre, telefono_padre, nombre_madre, profesion_madre,
    tipo_trabajo_madre, domicilio_madre, telefono_madre
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssssisssssssssisisssssssssss",
    $nombre, $estatura, $carrera, $peso, $fecha_nacimiento, $sexo, $edad, $estado_civil, $trabaja,
    $lugar_nacimiento, $domicilio_actual, $telefono, $cp, $email, $tipo_vivienda, $tipo_vivienda_propiedad,
    $tipo_otro, $num_personas, $parentesco, $nombre_padre, $edad_padre, $trabaja_padre, $profesion_padre,
    $tipo_trabajo_padre, $domicilio_padre, $telefono_padre, $nombre_madre, $profesion_madre,
    $tipo_trabajo_madre, $domicilio_madre, $telefono_madre
);

if ($stmt->execute()) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
