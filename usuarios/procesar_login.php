<?php
session_start();
include ("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password_ingresada = trim($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password_ingresada, $usuario['contrasena'])) {
            // Guardamos todas las credenciales clave en la sesión
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre_usuario'] = $usuario['nombre'];
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['direccion'] = $usuario['direccion'];
            
            echo "<script>alert('👋 ¡Bienvenido de nuevo a BADE, " . $usuario['nombre'] . "!'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('El correo no está registrado.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conexion->close();
}
?>