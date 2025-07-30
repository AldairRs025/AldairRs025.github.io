
CREATE TABLE datos_academicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primaria_nombre VARCHAR(255),
    primaria_ubicacion VARCHAR(255),
    secundaria_nombre VARCHAR(255),
    secundaria_ubicacion VARCHAR(255),
    bachillerato_nombre VARCHAR(255),
    bachillerato_ubicacion VARCHAR(255),
    superiores_nombre VARCHAR(255),
    superiores_ubicacion VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);