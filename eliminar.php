<?php
include('conexion.php');

$matricula = $_POST['matricula'];

$sql = "DELETE FROM login WHERE matricula='$matricula'";
if ($conn->query($sql) === TRUE) {
    header("Location: tutor.php");
} else {
    echo "Error al eliminar: " . $conn->error;
}
$conn->close();
?>
