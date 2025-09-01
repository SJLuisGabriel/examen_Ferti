<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$usuario_sesion = $_SESSION['usuario'];

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario_sesion);
$stmt->execute();

$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>