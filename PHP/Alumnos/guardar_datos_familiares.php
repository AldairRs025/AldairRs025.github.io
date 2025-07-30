<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorías";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$vivienda = $_POST['vivienda'];
$tipo = $_POST['tipo'];
$tipo_otro = $_POST['tipo_otro'];
$num_personas = $_POST['num_personas'];
$parentesco = $_POST['parentesco'];
$nombre_padre = $_POST['nombre_padre'];
$edad_padre = $_POST['edad_padre'];
$trabaja_padre = $_POST['trabaja_padre'];
$profesion_padre = $_POST['profesion_padre'];
$tipo_trabajo_padre = $_POST['tipo_trabajo_padre'];
$domicilio_padre = $_POST['domicilio_padre'];
$telefono_padre = $_POST['telefono_padre'];
$nombre_madre = $_POST['nombre_madre'];
$profesion_madre = $_POST['profesion_madre'];
$tipo_trabajo_madre = $_POST['tipo_trabajo_madre'];
$domicilio_madre = $_POST['domicilio_madre'];
$telefono_madre = $_POST['telefono_madre'];
$ingresos_familia = $_POST['ingresos_familia'];
$ingresos_propios = $_POST['ingresos_propios'];
$relacion_familia = $_POST['relacion_familia'];
$dificultades_familia = $_POST['dificultades_familia'];
$tipo_dificultades = $_POST['tipo_dificultades'];
$actitud_familia = $_POST['actitud_familia'];
$relacion_padre = $_POST['relacion_padre'];
$actitud_padre = $_POST['actitud_padre'];
$relacion_madre = $_POST['relacion_madre'];
$actitud_madre = $_POST['actitud_madre'];
$ligado_afectivamente = $_POST['ligado_afectivamente'];
$porque_ligado = $_POST['porque_ligado'];
$quien_educacion = $_POST['quien_educacion'];
$quien_influye_carrera = $_POST['quien_influye_carrera'];
$otros_datos_familiares = $_POST['otros_datos_familiares'];

// Insertar en la base de datos
$sql = "INSERT INTO datos_familiares (
    vivienda, tipo, tipo_otro, num_personas, parentesco,
    nombre_padre, edad_padre, trabaja_padre, profesion_padre, tipo_trabajo_padre, domicilio_padre, telefono_padre,
    nombre_madre, profesion_madre, tipo_trabajo_madre, domicilio_madre, telefono_madre,
    ingresos_familia, ingresos_propios, relacion_familia, dificultades_familia, tipo_dificultades, actitud_familia,
    relacion_padre, actitud_padre, relacion_madre, actitud_madre,
    ligado_afectivamente, porque_ligado, quien_educacion, quien_influye_carrera, otros_datos_familiares
) VALUES (
    '$vivienda', '$tipo', '$tipo_otro', '$num_personas', '$parentesco',
    '$nombre_padre', '$edad_padre', '$trabaja_padre', '$profesion_padre', '$tipo_trabajo_padre', '$domicilio_padre', '$telefono_padre',
    '$nombre_madre', '$profesion_madre', '$tipo_trabajo_madre', '$domicilio_madre', '$telefono_madre',
    '$ingresos_familia', '$ingresos_propios', '$relacion_familia', '$dificultades_familia', '$tipo_dificultades', '$actitud_familia',
    '$relacion_padre', '$actitud_padre', '$relacion_madre', '$actitud_madre',
    '$ligado_afectivamente', '$porque_ligado', '$quien_educacion', '$quien_influye_carrera', '$otros_datos_familiares'
)";

if ($conn->query($sql) === TRUE) {
    echo "Datos familiares registrados correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>