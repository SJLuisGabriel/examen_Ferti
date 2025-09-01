<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pagina = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['usuario'])) 
    $sesion_activa = false;
 else $sesion_activa = true;
?>

<nav>
    <div class="logo">Mi Proyecto</div>
    <ul>
        <li><a href="../usuario.php" class="activo">← Volver al perfil</a></li>

    </ul>
</nav>