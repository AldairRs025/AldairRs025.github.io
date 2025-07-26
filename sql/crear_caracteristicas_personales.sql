
CREATE TABLE caracteristicas_personales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    relacion_companeros VARCHAR(100),
    porque_relacion_companeros TEXT,
    relacion_amigos TEXT,
    tiene_pareja VARCHAR(10),
    relacion_pareja TEXT,
    relacion_profesores TEXT,
    relacion_autoridades TEXT,
    tiempo_libre TEXT,
    actividad_recreativa TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);