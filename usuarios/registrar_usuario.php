<?php
include("conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password_ingresada = trim($_POST['password']);
    $telefono = trim($_POST['telefono']);

    // Encriptamos la contraseña de forma segura
    $password_cifrada = password_hash($password_ingresada, PASSWORD_DEFAULT);

    $nombre = explode('@', $email)[0];
    $tipo = 'comprador';
    $fecha_registro = date('Y-m-d H:i:s');

    $verificar = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $verificar->bind_param("s", $email);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='register.php';</script>";
    } else {
        // Usamos 'contrasena' sin eñe
        $sql = "INSERT INTO usuarios (nombre, email, contrasena, telefono, tipo, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        
        $stmt->bind_param("ssssss", $nombre, $email, $password_cifrada, $telefono, $tipo, $fecha_registro);

        if ($stmt->execute()) {
            echo "<script>alert('¡Registro exitoso! Ya puedes iniciar sesión.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error al registrarse. Intente nuevamente.'); window.location.href='register.php';</script>";
        }
        $stmt->close();
    }
    $verificar->close();
    $conexion->close();
}
?>