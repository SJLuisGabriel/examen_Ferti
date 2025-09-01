<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include '../conexion.php';

$usuario_sesion = $_SESSION['usuario'];

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario_sesion);
$stmt->execute();

$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $puesto = trim($_POST['puesto']);

    if ($nombre == "" || $apellidos == "" || $puesto == "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, puesto = ? WHERE usuario = ?");
        $stmt->bind_param("ssss", $nombre, $apellidos, $puesto, $_SESSION['usuario']);

        if ($stmt->execute()) {
            $mensaje = "Perfil actualizado correctamente.";

            $usuario['nombre'] = $nombre;
            $usuario['apellidos'] = $apellidos;
            $usuario['puesto'] = $puesto;
        } else {
            $mensaje = "Error al actualizar: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php include 'menu_usuario.php'?>

    <h2 class="perfil-title">Editar Perfil</h2>

    <div class="perfil-container">
        <?php if ($mensaje != ""): ?>
        <p class="<?= strpos($mensaje, 'correctamente') !== false ? 'exito' : 'error' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </p>
        <?php endif; ?>

        <div class="editar-container">
            <form action="" method="POST">
                <label>Nombre:</label><br>
                <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required><br><br>

                <label>Apellidos:</label><br>
                <input type="text" name="apellidos" value="<?= htmlspecialchars($usuario['apellidos']) ?>"
                    required><br><br>

                <label>Puesto:</label><br>
                <input type="text" name="puesto" value="<?= htmlspecialchars($usuario['puesto']) ?>" required><br><br>

                <button type="submit" class="btn-editar">Actualizar</button>
            </form>
        </div>
    </div>
</body>


</html>