<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../conexion/conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../usuarios/login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

$stmt = $conexion->prepare("SELECT * FROM ventas WHERE id_usuario = ? ORDER BY id_venta DESC");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Historial de Compras</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #030825; color: #ffffff; min-height: 100vh;">

    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="../index.php">
                    <img src="../assets/images/logo-bade.png" alt="BADE Logo" class="logo-img-real">
                </a>
            </div>
            <div class="header-center">
                <a href="../index.php" class="btn-back" style="color:white; text-decoration:none; background:#ff2222; padding:8px 15px; border-radius:5px;"><i class="fa-solid fa-arrow-left"></i> Volver al Inicio</a>
            </div>
        </div>
    </header>

    <main class="main-content" style="max-width: 1000px; margin: 40px auto; padding: 0 20px;">
        <h2 style="color: #f1ad02; margin-bottom: 20px;"><i class="fa-solid fa-clock-rotate-left"></i> HISTORIAL DE COMPRAS DE <?php echo strtoupper(htmlspecialchars($_SESSION['nombre_usuario'])); ?></h2>
        
        <?php if ($resultado->num_rows === 0): ?>
            <p style="color: #a8b2d1; text-align: center; background: rgba(255,255,255,0.03); padding: 30px; border-radius: 8px;">Aún no has realizado ninguna compra en BADE.</p>
        <?php else: ?>
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <?php while($venta = $resultado->fetch_assoc()): ?>
                    <div style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px;">
                            <span style="color: #64ffda; font-weight: bold;">Venta #<?php echo $venta['id_venta']; ?></span>
                            <span style="color: #a8b2d1; font-size: 14px;"><?php echo $venta['fecha_venta'] ?? 'Fecha reciente'; ?></span>
                        </div>

                        <!-- Listado de Productos de la Compra -->
                        <div style="margin-bottom: 15px;">
                            <p style="color: #f1ad02; font-weight: bold; margin-bottom: 8px;"><i class="fa-solid fa-bag-shopping"></i> Productos adquiridos:</p>
                            <div style="display: flex; flex-direction: column; gap: 8px; background: rgba(0,0,0,0.3); padding: 12px; border-radius: 6px;">
                                <?php 
                                    $productos_comprados = json_decode($venta['productos'], true);
                                    if (!empty($productos_comprados) && is_array($productos_comprados)) {
                                        foreach ($productos_comprados as $prod) {
                                            $nombre_prod = htmlspecialchars($prod['title']);
                                            $cantidad_prod = intval($prod['cantidad']);
                                            $precio_prod = floatval($prod['price']);
                                            echo "<div style='display: flex; justify-content: space-between; font-size: 14px; color: #fff;'>
                                                    <span>• {$nombre_prod} (x{$cantidad_prod})</span>
                                                    <span style='color: #64ffda;'>$" . number_format($precio_prod * $cantidad_prod, 2) . "</span>
                                                  </div>";
                                        }
                                    } else {
                                        echo "<p style='color: #a8b2d1; font-size: 13px;'>Detalle no disponible para esta venta antigua.</p>";
                                    }
                                ?>
                            </div>
                        </div>

                        <p style="margin-bottom: 8px;"><strong>Método de Pago:</strong> <?php echo htmlspecialchars($venta['metodo_pago']); ?></p>
                        <p style="margin-bottom: 8px;"><strong>Estado del Pago:</strong> <?php echo htmlspecialchars($venta['estado_pago']); ?></p>
                        <p style="margin-bottom: 12px;"><strong>Estado de la Compra:</strong> <?php echo htmlspecialchars($venta['estado']); ?></p>
                        
                        <div style="text-align: right; font-size: 18px; font-weight: bold; color: #64ffda; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 10px;">
                            Monto Total: $<?php echo number_format($venta['monto_total'], 2); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>