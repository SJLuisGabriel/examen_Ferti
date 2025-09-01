<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include '../conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: listar_productos.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../listar_productos.php");
    exit();
} else {
    echo "Error al eliminar producto: " . $conn->error;
}
?>