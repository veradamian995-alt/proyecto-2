<?php
session_start();
include("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['id_usuario'])) {
        echo "<script>alert('Debes iniciar sesión para realizar la compra.'); window.location.href='../usuarios/login.php';</script>";
        exit();
    }

    $id_usuario = $_SESSION['id_usuario'];
    $metodo_pago = $_POST['metodo_pago'];
    $total = floatval($_POST['total']);
    $productos_json = $_POST['productos_json']; // Recibimos el JSON del carrito
    
    $estado_pago = "Completado";
    $estado = "En proceso";

    // Modificamos para guardar también los productos en la columna 'productos' de la tabla ventas
    $stmt = $conexion->prepare("INSERT INTO ventas (id_usuario, monto_total, metodo_pago, estado_pago, estado, productos) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idssss", $id_usuario, $total, $metodo_pago, $estado_pago, $estado, $productos_json);
    
    if ($stmt->execute()) {
        echo "<script>localStorage.removeItem('carritoBADE'); alert('🛍️ ¡Gracias por tu compra en BADE! Tu pedido ha sido registrado con éxito.'); window.location.href='historial.php';</script>";
    } else {
        echo "<script>alert('Error al procesar la compra.'); window.location.href='carrito.php';</script>";
    }
    $stmt->close();
    $conexion->close();
}
?>