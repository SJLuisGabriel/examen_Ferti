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
        <li><a href="index.php" class="<?= ($pagina == 'index.php') ? 'activo' : '' ?> ">Inicio</a></li>
        <li><a href="usuario.php"
                class="<?= ($pagina == 'usuario.php') ? 'activo' : '' ?> <?= ($sesion_activa == false) ? 'disabled' : '' ?>">Perfil</a>
        </li>
        <li><a href="listar_productos.php"
                class="<?= ($pagina == 'listar_productos.php') ? 'activo' : '' ?> <?= ($sesion_activa == false) ? 'disabled' : '' ?>">Productos</a>
        </li>
        <?php if ($sesion_activa): ?>
        <li><a href="usuarios/logout.php" class="<?= ($sesion_activa == false) ? 'disabled' : '' ?>">Salir</a>
        </li>
        <?php else :?>
        <li><a href="login.php" class="<?= ($pagina == 'login.php') ? 'activo' : '' ?>">Login</a></li>
        <?php endif;?>
    </ul>
</nav>