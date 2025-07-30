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
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
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
  <style>
    /* **********aciones**************** */
    button {
      padding: 6px 12px;
      margin: 2px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .agregar-btn {
      background-color: #28a745;
      color: white;
    }
    .editar-btn {
      background-color: #ffc107;
    }
    .eliminar-btn {
      background-color: #dc3545;
      color: white;
    }
    /* ****************popup acciones************** */
    
    .popup {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
    }
    .popup-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }
    .popup-content input {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .popup-close {
      float: right;
      cursor: pointer;
      font-weight: bold;
      color: #aaa;
    }
    .popup-close:hover {
      color: #000;
    }
  </style>
  <script>
    function mostrarSeccion(id) {
      const secciones = document.querySelectorAll('.seccion');
      secciones.forEach(s => s.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
  </script>

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

    $sql = "SELECT matricula, rol, carrera FROM login WHERE carrera = 'Contador Público' AND rol != 'tutor'";

    $result = $conn->query($sql);
    echo '<button class="agregar-btn" onclick="mostrarPopup(\'agregar\')">+ Agregar Usuario</button>';
    if ($result->num_rows > 0) {
      echo "<table><tr><th>Matrícula</th><th>Rol</th><th>Carrera</th><th>Acciones</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["matricula"] . "</td><td>" . $row["rol"] . "</td><td>" . $row["carrera"] . "</td>";
        echo '<td>';
        echo '<button class="editar-btn" onclick="mostrarPopup(\'actualizar\', \'' . $row['matricula'] . '\', \'' . $row['rol'] . '\', \'' . $row['carrera'] . '\')">Editar</button>';
        echo '<form action="eliminar.php" method="POST" style="display:inline">';
        echo '<input type="hidden" name="matricula" value="' . $row['matricula'] . '">';
        echo '<button class="eliminar-btn" type="submit">Eliminar</button>';
        echo '</form>';
        echo '</td></tr>';

      }
      echo "</table>";
    } else {
      echo "No se encontraron alumnos.";
    }

    $conn->close();
    ?>
  </div>

  <!-- Popup Genérico -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="popup-close" onclick="cerrarPopup()">&times;</span>
      <form id="popup-form" method="POST">
        <input type="hidden" name="modo" id="modo">
        <label>Matrícula</label>
        <input type="text" name="matricula" id="matricula" required>
        <label>Rol</label>
        <input type="text" name="rol" id="rol" required>
        <label>Carrera</label>
        <input type="text" name="carrera" id="carrera" required>
        <label>Contraseña</label>
        <input type="password" name="contrasena" id="contrasena">
        <button type="submit" class="agregar-btn">Guardar</button>
      </form>
    </div>
  </div>

  <script>
    function mostrarPopup(modo, matricula = '', rol = '', carrera = '') {
      document.getElementById('popup').style.display = 'block';
      document.getElementById('popup-form').action = modo === 'agregar' ? 'guardar_agregado.php' : 'guardar_actualizacion.php';
      document.getElementById('modo').value = modo;
      document.getElementById('matricula').value = matricula;
      document.getElementById('rol').value = rol;
      document.getElementById('carrera').value = carrera;
      document.getElementById('contrasena').value = '';
      document.getElementById('matricula').readOnly = (modo === 'actualizar');
    }

    function cerrarPopup() {
      document.getElementById('popup').style.display = 'none';
    }
  </script>

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