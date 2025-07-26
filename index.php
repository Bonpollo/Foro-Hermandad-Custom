<?php
include("db.php");
$resultado = $conexion->query("SELECT temas.*, usuarios.usuario FROM temas JOIN usuarios ON temas.autor_id = usuarios.id ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Foro Hermandad Custom Lleida</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Foro Hermandad Custom Lleida</h1>
    <?php if (isset($_SESSION['usuario'])): ?>
        <p>Bienvenido, <?= $_SESSION['usuario'] ?> | <a href="nuevo_tema.php">Nuevo Tema</a> | <a href="logout.php">Cerrar sesión</a></p>
    <?php else: ?>
        <p><a href="login.php">Iniciar Sesión</a> | <a href="registro.php">Registrarse</a></p>
    <?php endif; ?>
    <ul>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <li>
                <a href="tema.php?id=<?= $fila['id'] ?>"><?= htmlspecialchars($fila['titulo']) ?></a> por <?= htmlspecialchars($fila['usuario']) ?> (<?= $fila['fecha'] ?>)
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
