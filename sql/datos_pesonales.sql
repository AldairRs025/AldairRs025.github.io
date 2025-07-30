CREATE TABLE datos_personales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    estatura VARCHAR(10),
    carrera VARCHAR(100),
    peso VARCHAR(10),
    fecha_nacimiento DATE,
    sexo VARCHAR(10),
    edad INT,
    estado_civil VARCHAR(20),
    trabaja VARCHAR(5),
    lugar_nacimiento VARCHAR(100),
    domicilio_actual VARCHAR(255),
    telefono VARCHAR(20),
    cp VARCHAR(10),
    email VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
