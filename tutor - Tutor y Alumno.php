<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel del Tutor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      background: white;
    }

    .header img {
      height: 70px;
    }

    .header-title {
      color: #8a1538;
      font-size: 1.4rem;
      font-weight: bold;
      flex: 1;
      text-align: center;
      margin-left: 70px;
    }

    .divider {
      height: 5px;
      background-color: #8a1538;
    }

    .menu-btn {
      font-size: 24px;
      background: none;
      border: none;
      cursor: pointer;
      color: #8a1538;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #8a1538;
      color: white;
      padding: 20px;
      box-sizing: border-box;
      transition: transform 0.3s ease;
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    .sidebar .close-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 20px;
      cursor: pointer;
    }

    .content {
      margin-left: 250px;
      transition: margin-left 0.3s ease;
      padding: 20px;
    }

    .content.full {
      margin-left: 0;
    }

    .logos {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      transition: transform 0.3s ease;
    }

    .logos.shifted {
      transform: translateX(250px);
    }

    .logos img {
      height: 60px;
    }

    .tablas {
      margin-left: 0;
    }

    .tablas.ocultar {
      margin-left: 250px;
      transition: margin-left 0.3s ease;
      padding: 20px;
    }

    .seccion {
      display: none;
    }

    table {
      border-collapse: collapse;
      width: 80%;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #eee;
    }
  </style>
  <script>
    function mostrarSeccion(id) {
      const secciones = document.querySelectorAll('.seccion');
      secciones.forEach(s => s.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
  </script>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }
    th {
        background-color: #80002a;
        color: #fff;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>

</head>

<body onload="openSidebar()">
  <div class="sidebar" id="sidebar">
    <span class="close-btn" onclick="toggleSidebar()">✖</span>
    <p><strong>Inicio</strong></p>
    <p onclick="mostrarSeccion('alumnos')" style="cursor: pointer; color: white;">Alumnos</p>
    <p onclick="mostrarSeccion('reportes')" style="cursor: pointer; color: white;">Reportes</p>
    <p onclick="mostrarSeccion('config')" style="cursor: pointer; color: white;">Configuración</p>
  </div>
  <br>
  <div class="divider"></div>
  <div class="header">
    <span class="menu-btn" onclick="toggleSidebar()">☰</span>
    <div class="logos" id="logos">
      <img src="img/logo.svg" alt="Logo Estado de México">
    </div>
    <div class="header-title">
      Tecnológico de Estudios Superiores del Oriente del Estado de México
    </div>
  </div>
  <div class="divider"></div>

  <div class="content" id="mainContent">
    <h2>Bienvenido al Panel del Tutor</h2>
    <p>Selecciona una opción del menú para comenzar.</p>
  </div>

  <div id="seccion-alumnos" style="display:none; padding:20px;" class="tablas">
    <h2>Lista de Formularios de Alumnos</h2><?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutorías";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT matricula, rol, carrera FROM login";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table><tr><th>Matrícula</th><th>Rol</th><th>Carrera</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["matricula"] . "</td><td>" . $row["rol"] . "</td><td>" . $row["carrera"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No se encontraron alumnos.";
    }

    $conn->close();
    ?>
  </div>

  <!-- ***************************MOSTRAR EL CONTENIDO DE CADA SECCION DEL MENU************* -->
  <script>
    function mostrarSeccion(seccion) {
      document.querySelectorAll("div[id^='seccion-']").forEach(div => div.style.display = "none");
      document.getElementById("seccion-" + seccion).style.display = "block";
    }

  </script>

  <!-- ***********************DESPLAZAR CONTENIDO CON EL MENU*************************** -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('mainContent');
      const logos = document.getElementById('logos');
      const tablas = document.getElementById('seccion-alumnos');

      sidebar.classList.toggle('closed');
      content.classList.toggle('full');
      logos.classList.toggle('shifted');
      tablas.classList.toggle('ocultar');
    }

    function openSidebar() {
      document.getElementById('sidebar').classList.remove('closed');
      document.getElementById('mainContent').classList.remove('full');
      document.getElementById('logos').classList.add('shifted');
      document.getElementById('seccion-alumnos').classList.add('ocultar');
    }
  </script>

</body>

</html>