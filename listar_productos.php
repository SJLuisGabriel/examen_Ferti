<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$result = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
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
    <?php include 'menu.php'; ?>


    <h2 class="productos-title">Lista de Productos</h2>

    <div class="productos-actions">
        <a href="productos/agregar_productos.php" class="btn-agregar">Agregar Producto</a>
    </div>

    <div class="productos-table-container">
        <table class="productos-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td><?= $row['precio'] ?></td>
                    <td><?= $row['fecha_c'] ?></td>
                    <td>
                        <a href="productos/editar_productos.php?id=<?= $row['id'] ?>" class="btn-editar">Editar</a>
                        <a href="productos/eliminar_productos.php?id=<?= $row['id'] ?>" class="btn-eliminar"
                            onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>


</html>