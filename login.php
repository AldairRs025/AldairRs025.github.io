
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorías";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $contrasena = $_POST['password'];

    $sql = "SELECT * FROM login WHERE Matricula = '$matricula' AND Contraseña = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $rol = $row['Rol'];
        $carrera = $row['Carrera'];

        if ($rol == "alumno") {
            switch ($carrera) {
                case "Contador Público":
                    header("Location: contador.html");
                    break;
                case "Gastronomía":
                    header("Location: gastronomia.html");
                    break;
                case "Ingeniería Ambiental":
                    header("Location: ambiental.html");
                    break;
                case "Ingeniería en Administración":
                    header("Location: admin.html");
                    break;
                case "Ingeniería en Sistemas Computacionales":
                    header("Location: sistemas.html");
                    break;
                case "Ingeniería en Tecnologías de la Información y Comunicaciones":
                    header("Location: tic.html");
                    break;
                case "Ingeniería en Energías Renovables":
                    header("Location: renovables.html");
                    break;
                case "Ingeniería Industrial":
                    header("Location: industrial.html");
                    break;
                case "Ingeniería en Sistemas Automotrices":
                    header("Location: automotriz.html");
                    break;
                default:
                    echo "Carrera no reconocida.";
            }
        } elseif ($rol == "tutor") {
            switch ($carrera) {
                case "Contador Público":
                    header("Location: tutor.html");
                    break;
                case "Gastronomía":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería Ambiental":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería en Administración":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería en Sistemas Computacionales":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería en Tecnologías de la Información y Comunicaciones":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería en Energías Renovables":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería Industrial":
                    header("Location: tutor.html");
                    break;
                case "Ingeniería en Sistemas Automotrices":
                    header("Location: tutor.html");
                    break;
                default:
                    echo "Carrera no reconocida.";
            }
        } else {
            echo "Rol no válido.";
        }
    } else {
        header("Location: index.html?error=1");
    exit();
    }
}
$conn->close();
?>
