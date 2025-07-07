<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorías"; // Base de datos corregida
$tabla = "contador";  // Tabla corregida

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener checkbox múltiples
function getCheckboxValue($field) {
    if (isset($_POST[$field])) {
        if (is_array($_POST[$field])) {
            return implode(", ", $_POST[$field]);
        } else {
            return $_POST[$field];
        }
    }
    return '';
}

// Escapar todos los datos recibidos
function escape($conn, $value) {
    return mysqli_real_escape_string($conn, $value);
}

// Escapar cada campo
$nombre = escape($conn, $_POST['nombre']);
$estatura = escape($conn, $_POST['estatura']);
$carrera = escape($conn, $_POST['carrera']);
$peso = escape($conn, $_POST['peso']);
$fecha_nacimiento = escape($conn, $_POST['fecha_nacimiento']);
$sexo = escape($conn, $_POST['sexo']);
$edad = escape($conn, $_POST['edad']);
$estado_civil = escape($conn, $_POST['estado_civil']);
$trabaja = escape($conn, $_POST['trabaja']);
$lugar_nacimiento = escape($conn, $_POST['lugar_nacimiento']);
$domicilio_actual = escape($conn, $_POST['domicilio_actual']);
$telefono = escape($conn, $_POST['telefono']);
$cp = escape($conn, $_POST['cp']);
$email = escape($conn, $_POST['email']);

$vivienda = escape($conn, getCheckboxValue('vivienda'));
$tipo = escape($conn, getCheckboxValue('tipo'));
$tipo_otro = escape($conn, $_POST['tipo_otro']);
$num_personas = escape($conn, $_POST['num_personas']);
$parentesco = escape($conn, $_POST['parentesco']);
$nombre_padre = escape($conn, $_POST['nombre_padre']);
$edad_padre = escape($conn, $_POST['edad_padre']);
$trabaja_padre = escape($conn, getCheckboxValue('trabaja_padre'));
$profesion_padre = escape($conn, $_POST['profesion_padre']);
$tipo_trabajo_padre = escape($conn, $_POST['tipo_trabajo_padre']);
$domicilio_padre = escape($conn, $_POST['domicilio_padre']);
$telefono_padre = escape($conn, $_POST['telefono_padre']);

$nombre_madre = escape($conn, $_POST['nombre_madre']);
$profesion_madre = escape($conn, $_POST['profesion_madre']);
$tipo_trabajo_madre = escape($conn, $_POST['tipo_trabajo_madre']);
$domicilio_madre = escape($conn, $_POST['domicilio_madre']);
$telefono_madre = escape($conn, $_POST['telefono_madre']);

// Preparar SQL
$sql = "INSERT INTO $tabla (
    nombre, estatura, carrera, peso, fecha_nacimiento, sexo, edad, estado_civil, trabaja, lugar_nacimiento, domicilio_actual, telefono, cp, email,
    vivienda, tipo, tipo_otro, num_personas, parentesco,
    nombre_padre, edad_padre, trabaja_padre, profesion_padre, tipo_trabajo_padre, domicilio_padre, telefono_padre,
    nombre_madre, profesion_madre, tipo_trabajo_madre, domicilio_madre, telefono_madre
) VALUES (
    '$nombre', '$estatura', '$carrera', '$peso', '$fecha_nacimiento', '$sexo', '$edad', '$estado_civil', '$trabaja', '$lugar_nacimiento', '$domicilio_actual', '$telefono', '$cp', '$email',
    '$vivienda', '$tipo', '$tipo_otro', '$num_personas', '$parentesco',
    '$nombre_padre', '$edad_padre', '$trabaja_padre', '$profesion_padre', '$tipo_trabajo_padre', '$domicilio_padre', '$telefono_padre',
    '$nombre_madre', '$profesion_madre', '$tipo_trabajo_madre', '$domicilio_madre', '$telefono_madre'
)";

// Ejecutar consulta
if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
