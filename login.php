<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Productos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <h2 class="login-title">Iniciar Sesión</h2>
    <div class="container">
        <div class="login-container">
            <form action="usuarios/login_procesar.php" method="POST">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" required><br><br>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" required><br><br>

                <?php if (isset($_GET['error'])): ?>
                <div class="error">
                    <?php 
            if ($_GET['error'] == "usuario") echo "Usuario no encontrado.";
            if ($_GET['error'] == "password") echo "Contraseña incorrecta.";
            ?>
                </div>
                <?php endif; ?>

                <button type="submit">Ingresar</button>
            </form>
        </div>

        <hr>

        <h2 class="login-title">Agregar Nuevo Usuario</h2>
        <div class="login-container">

            <form action="usuarios/registrar_usuario.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br><br>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" required><br><br>

                <label for="puesto">Puesto:</label>
                <input type="text" name="puesto"><br><br>

                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" required><br><br>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" required><br><br>

                <button type="submit">Registrar Usuario</button>
            </form>
        </div>
    </div>
</body>
<footer class="footer">
    <p>© 2025 Proyecto Fertilab - Desarrollado por LUIS GABRIEL SANCHEZ JUNGO</p>
</footer>

</html>