<?php
include("db.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $password);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
    } else {
        $mensaje = "Error: el nombre de usuario ya existe.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro - Foro Hermandad</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Registro</h1>
    <?php if ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Registrarse">
    </form>
    <p><a href="index.php">Volver al foro</a></p>
</body>
</html>
