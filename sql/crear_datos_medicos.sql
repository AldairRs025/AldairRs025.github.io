
CREATE TABLE datos_medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prescripcion VARCHAR(10),
    deficiencia TEXT,
    observaciones_higiene TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);