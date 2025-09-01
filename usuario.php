<?php
include 'usuarios/get_usuario.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'menu.php';?>
    <div class="container">

        <h2 class="perfil-title">Perfil de <?= htmlspecialchars($usuario['nombre']) ?></h2>
        <div class="perfil-container">
            <div class="perfil-info">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
                <p><strong>Apellidos:</strong> <?= htmlspecialchars($usuario['apellidos']) ?></p>
                <p><strong>Puesto:</strong> <?= htmlspecialchars($usuario['puesto']) ?></p>
                <p><strong>Fecha de Registro:</strong>
                    <?= date("Y-m-d", strtotime($usuario['fecha_r'])) ?>
                </p>
                <p><strong>Usuario:</strong> <?= htmlspecialchars($usuario['usuario']) ?></p>
            </div>

            <div class="perfil-actions">
                <a href="usuarios/editar_usuario.php" class="btn-editar">Editar Perfil</a>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <p>© 2025 Proyecto Fertilab - Desarrollado por LUIS GABRIEL SANCHEZ JUNGO</p>
</footer>

</html>