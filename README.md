# Proyecto de Desarrollo Web - Fertilab

Este proyecto fue desarrollado como parte del **examen de conocimientos** para el puesto de **Programador en el área de Sistemas de Fertilab**.  
El objetivo es demostrar habilidades en **HTML5, CSS3, JavaScript, jQuery, PHP, MySQL y Git** mediante la creación de un sistema de usuarios y productos con funcionalidades CRUD y login de acceso.

---

## Introducción

El sistema está diseñado para gestionar información de usuarios y productos en un entorno web.  
Cuenta con autenticación de usuarios, un módulo de productos con las operaciones **crear, leer, actualizar y eliminar (CRUD)**, además de conexión a base de datos con MySQL.

---

## Funcionalidades

- **Base de datos** con tablas `usuarios` y `productos`.
- **Login seguro** con validación en PHP y MySQL.
- **Gestión de productos**: agregar, editar y eliminar registros.
- **Perfil de usuario**: muestra datos personales y del puesto.
- **Conexión a base de datos** centralizada mediante archivo de configuración.

---

## Script de Base de Datos

```sql
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
```
