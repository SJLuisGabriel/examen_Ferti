<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $puesto = $_POST['puesto'];
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "El usuario ya existe.";
    } else {
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, puesto, usuario, passw) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $apellidos, $puesto, $usuario, $password);
        if ($stmt->execute()) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nombre'] = $nombre;

            header("Location: ../index.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>