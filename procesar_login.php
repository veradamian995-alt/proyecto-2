<?php
session_start();
// Aquí abajo ya puede ir el resto del código HTML de tu página
?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_ingresado = trim($_POST['usuario']);
    $password_ingresada = trim($_POST['password']);

    $sql = "SELECT id_usuario, nombre, email FROM usuarios WHERE email = ? OR nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario_ingresado, $usuario_ingresado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Guardamos los datos en la sesión activa
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre_usuario'] = $usuario['nombre'];
        $_SESSION['email_usuario'] = $usuario['email'];

        // Redirigir al home principal
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Usuario o correo no encontrado.'); window.location.href='login.html';</script>";
    }
    
    $stmt->close();
    $conexion->close();
}
?>