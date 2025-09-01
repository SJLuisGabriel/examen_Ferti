CREATE DATABASE fertilab_examen;

    USE fertilab_examen;

    -- Tabla de usuarios
    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        puesto VARCHAR(50) NOT NULL,
        fecha_r DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    -- Tabla de productos
    CREATE TABLE productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        descripcion VARCHAR(255),
        precio DECIMAL(10,2) NOT NULL,
        fecha_c TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- ALTER TABLE de usuarios
    ALTER TABLE usuarios
        ADD COLUMN usuario VARCHAR(50) UNIQUE NOT NULL AFTER puesto,
        ADD COLUMN passw VARCHAR(255) NOT NULL AFTER usuario;