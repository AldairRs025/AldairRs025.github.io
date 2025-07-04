<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Contador Público</title>
</head>
<body>
    <h2>Formulario de Contador Público</h2>
    <form action="guardar_datos.php" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Estatura: <input type="text" name="estatura"><br>
        Carrera: <input type="text" name="carrera"><br>
        Peso: <input type="text" name="peso"><br>
        Fecha de nacimiento: <input type="date" name="fecha_nacimiento"><br>
        Sexo: <input type="text" name="sexo"><br>
        Edad: <input type="number" name="edad"><br>
        Estado civil: <input type="text" name="estado_civil"><br>
        ¿Trabaja?: <input type="text" name="trabaja"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
