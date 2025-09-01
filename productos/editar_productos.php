<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include '../conexion.php';

$mensaje = "";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: listar_productos.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Producto no encontrado.";
    exit();
}

$producto = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = $_POST['precio'];

    if ($nombre == "" || $precio == "") {
        $mensaje = "Nombre y precio son obligatorios.";
    } else {
        $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $id);

        if ($stmt->execute()) {
            $mensaje = "Producto actualizado correctamente.";
            $producto['nombre'] = $nombre;
            $producto['descripcion'] = $descripcion;
            $producto['precio'] = $precio;
        } else {
            $mensaje = "Error al actualizar producto: " . $conn->error;
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
    <h2 class="editar-producto-title">Editar Producto</h2>

    <div class="productos-container">
        <?php if ($mensaje != ""): ?>
        <p class="<?= strpos($mensaje, 'correctamente') !== false ? 'exito' : 'error' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </p>
        <?php endif; ?>

        <div class="editar-productos-container">
            <form action="" method="POST">
                <label>Nombre:</label><br>
                <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

                <label>Descripción:</label><br>
                <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea><br><br>

                <label>Precio:</label><br>
                <input type="number" step="0.01" name="precio" class="input-number" value="<?= $producto['precio'] ?>"
                    required><br><br>

                <button type="submit" class="btn-editar">Actualizar</button>
            </form>
        </div>
    </div>

</body>

</html>