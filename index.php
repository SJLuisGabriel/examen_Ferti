<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EXAMEN FERTILAP</title>
    <meta name="description" content="Examen de conocimiento para Fertilab">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        include 'menu.php';
    ?>
    <header class="header">
        <img src="images/logo-fertilab.png" alt="Logo Fertilab" class="logo-index">
        <h1>Proyecto de Desarrollo Web</h1>
    </header>

    <div class="container">

        <section id="introduccion">
            <h2>Introducción</h2>
            <hr>
            <p>
                Este proyecto forma parte del examen para el puesto de Programador en el área de Sistemas de Fertilab.
                El objetivo es demostrar conocimientos en HTML5, CSS3, JavaScript, jQuery, PHP, MySQL y Git, aplicados
                en un sistema de usuarios y productos con funcionalidades CRUD y login de acceso.
            </p>
        </section>

        <section id="documentacion">
            <h2>Documentación</h2>
            <hr>
            <p>
                El sistema incluye:
            </p>
            <ul>
                <li>Creación de base de datos con tablas <b>usuarios</b> y <b>productos</b>.</li>
                <li>Login de acceso validado con PHP y MySQL.</li>
                <li>Módulo de productos con altas, modificaciones y eliminación.</li>
                <li>Módulo de usuarios para mostrar información del perfil.</li>
                <li>Conexión a la base de datos mediante archivo de configuración.</li>
            </ul>
        </section>
        <section class="script-section">
            <h2>📜 Script de Base de Datos</h2>
            <hr>
            <p>A continuación se muestra el script SQL para crear la base de datos y sus tablas:</p>

            <div class="code-container">
                <pre><code id="sql-script">
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
        </code></pre>
                <button onclick="copiarSQL()">📋 Copiar Script</button>
            </div>
        </section>

        <script>
        function copiarSQL() {
            const codigo = document.getElementById("sql-script").innerText;
            navigator.clipboard.writeText(codigo).then(() => {
                alert("Script copiado al portapapeles");
            }).catch(err => {
                alert("Error al copiar: " + err);
            });
        }
        </script>

        <section id="github">
            <h2>Repositorio en GitHub</h2>
            <hr>
            <p>
                Puedes revisar el código completo en el siguiente enlace:<br>
                <a href="https://github.com/TU_USUARIO/TU_REPO" target="_blank">
                    GitHub - Proyecto Fertilab
                </a>
            </p>
        </section>
    </div>

    <footer class="footer">
        <p>© 2025 Proyecto Fertilab - Desarrollado por LUIS GABRIEL SANCHEZ JUNGO</p>
    </footer>
</body>

</html>