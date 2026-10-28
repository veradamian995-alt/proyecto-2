<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bade";

$conexion = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Configurar charset utf8
$conexion->set_charset("utf8mb4");
?>