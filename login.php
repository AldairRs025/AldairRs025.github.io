
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

    $sql = "SELECT * FROM login WHERE Matricula = '$matricula' AND Contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $rol = $row['Rol'];
        $carrera = $row['Carrera'];

        if ($rol == "alumno") {
            switch ($carrera) {
                case "Contador Público":
                    header("Location: alum_1ConPub.html");
                    break;
                case "Gastronomía":
                    header("Location: alum_2Gas.html");
                    break;
                case "Ingeniería Ambiental":
                    header("Location: alum_3IngAmb.html");
                    break;
                case "Ingeniería en Administración":
                    header("Location: alum_4IngAdmin.html");
                    break;
                case "Ingeniería en Sistemas Computacionales":
                    header("Location: alum_5ISC.html");
                    break;
                case "Ingeniería en Tecnologías de la Información y Comunicaciones":
                    header("Location: alum_6TIC.html");
                    break;
                case "Ingeniería en Energías Renovables":
                    header("Location: alum_7EneRen.html");
                    break;
                case "Ingeniería Industrial":
                    header("Location: alum_8Ind.html");
                    break;
                case "Ingeniería en Sistemas Automotrices":
                    header("Location: alum_9IngSisAut.html");
                    break;
                default:
                    echo "Carrera no reconocida.";
            }
        } elseif ($rol == "tutor") {
            switch ($carrera) {
                case "Contador Público":
                    header("Location: tutor_1ConPub.php");
                    break;
                case "Gastronomía":
                    header("Location: tutor_2Gas.php");
                    break;
                case "Ingeniería Ambiental":
                    header("Location: tutor_3IngAmb.php");
                    break;
                case "Ingeniería en Administración":
                    header("Location: tutor_4IngAdmin.php");
                    break;
                case "Ingeniería en Sistemas Computacionales":
                    header("Location: tutor_5ISC.php");
                    break;
                case "Ingeniería en Tecnologías de la Información y Comunicaciones":
                    header("Location: tutor_6TIC.php");
                    break;
                case "Ingeniería en Energías Renovables":
                    header("Location: tutor_7EneRen.php");
                    break;
                case "Ingeniería Industrial":
                    header("Location: tutor_8Ind.php");
                    break;
                case "Ingeniería en Sistemas Automotrices":
                    header("Location: tutor_9IngSisAut.php");
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
