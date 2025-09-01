<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        if (password_verify($password, $row['passw'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../login.php?error=password");
            exit();
        }
    } else {
        header("Location: ../login.php?error=usuario");
            exit();
    }
}
?>