<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $telefono = trim($_POST['telefono']);
    
    // Extraemos un nombre basado en el correo
    $nombre = explode('@', $email)[0];
    $tipo = 'comprador'; // Por defecto
    $fecha_registro = date('Y-m-d H:i:s');

    // Verificar si el correo ya existe
    $verificar = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $verificar->bind_param("s", $email);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='register.html';</script>";
    } else {
        $sql = "INSERT INTO usuarios (nombre, email, telefono, tipo, fecha_registro) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $email, $telefono, $tipo, $fecha_registro);

        if ($stmt->execute()) {
            echo "<script>alert('¡Registro exitoso! Ya puedes iniciar sesión.'); window.location.href='login.html';</script>";
        } else {
            echo "<script>alert('Error al registrarse. Intente nuevamente.'); window.location.href='register.html';</script>";
        }
        $stmt->close();
    }
    $verificar->close();
    $conexion->close();
}
?>