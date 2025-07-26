<?php
$host = 'localhost';
$usuario = 'Admin';
$contrasena = 'Admin';
$base_datos = 'foro_db';

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

session_start();
?>