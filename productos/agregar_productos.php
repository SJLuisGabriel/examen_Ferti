<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include '../conexion.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = $_POST['precio'];

    if ($nombre == "" || $precio == "") {
        $mensaje = "Nombre y precio son obligatorios.";
    } else {
        $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $descripcion, $precio);

        if ($stmt->execute()) {
            $mensaje = "Producto agregado correctamente.";
        } else {
            $mensaje = "Error al agregar producto: " . $conn->error;
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
    <?php include 'menu_productos.php'?>
    <h2 class="agregar-producto-title">Agregar Producto</h2>

    <div class="productos-container">
        <?php if ($mensaje != ""): ?>
        <p class="<?= strpos($mensaje, 'correctamente') !== false ? 'exito' : 'error' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </p>
        <?php endif; ?>

        <div class="agregar-productos-container">
            <form action="" method="POST">
                <label>Nombre:</label><br>
                <input type="text" name="nombre" required><br><br>

                <label>Descripción:</label><br>
                <textarea name="descripcion"></textarea><br><br>

                <label>Precio:</label><br>
                <input type="number" step="0.01" name="precio" required><br><br>

                <button type="submit" class="btn-editar">Agregar</button>
            </form>
        </div>
    </div>
</body>


</html>