<?php
session_start();
$id_producto = isset($_GET['id']) ? intval($_GET['id']) : 1;
include("../conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Detalle del Producto</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #030825; color: #ffffff; min-height: 100vh;">

    <!-- Encabezado / Header -->
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
            <div class="user-actions">
                <a href="carrito.php" style="color: #64ffda; text-decoration: none; font-weight: bold; margin-right: 15px; position: relative; font-size: 18px;">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="cart-count" style="background: #ff2222; color: white; border-radius: 50%; padding: 2px 7px; font-size: 12px; position: absolute; top: -8px; right: -12px;">0</span>
                </a>
                <?php if (isset($_SESSION['nombre_usuario'])): ?>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="color: white; font-weight: bold;"><?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></span>
                        <a href="../index.php#mi-perfil-seccion" title="Ver mi Perfil" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px solid #f1ad02; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #f1ad02; font-size: 18px; text-decoration: none;">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="../usuarios/logout.php" title="Cerrar sesión" style="color: #ff5555; margin-left: 5px; font-size: 16px;"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                <?php else: ?>
                    <a href="../usuarios/login.php" class="btn btn-login">Iniciar sesión</a>
                    <a href="../usuarios/register.php" class="btn btn-register">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Detalle Principal del Producto -->
    <main class="main-content" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
        <div id="product-detail-container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;">
            
            <div class="product-gallery" style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                <div id="main-image-box" style="text-align: center; height: 380px; display: flex; align-items: center; justify-content: center; position: relative;">
                    <img id="detail-img" src="" alt="Cargando producto..." style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 8px;">
                </div>
                <div id="thumbnails-container" style="display: flex; gap: 10px; margin-top: 15px; justify-content: center; overflow-x: auto;"></div>
            </div>

            <div class="product-purchase-info">
                <h1 id="detail-title" style="font-size: 28px; margin-bottom: 10px; color: #fff;">Cargando título...</h1>
                <p id="detail-brand" style="color: #64ffda; font-size: 14px; margin-bottom: 15px; font-weight: bold;">Cargando marca...</p>
                
                <div id="detail-price" style="font-size: 36px; font-weight: bold; color: #ffffff; margin-bottom: 20px;">$0</div>
                
                <div style="background: rgba(0,0,0,0.3); padding: 15px; border-radius: 8px; border: 1px solid #00bfff; margin-bottom: 20px;">
                    <h3 style="color: #00bfff; margin-bottom: 8px; font-size: 16px;">Descripción:</h3>
                    <p id="detail-description" style="font-size: 14px; line-height: 1.5; color: #a8b2d1;">Cargando información del producto...</p>
                </div>

                <div style="margin-bottom: 15px;">
                    <span style="color: #64ffda; font-weight: bold; font-size: 15px;"><i class="fa-solid fa-truck"></i> Envío estándar disponible en BADE</span>
                </div>
                <div style="margin-bottom: 15px; color: #64ffda; font-weight: bold; font-size: 15px;">
                    <i class="fa-solid fa-shield-halved"></i> Garantía oficial BADE: 7 meses
                </div>
                
                <div style="margin-bottom: 25px;">
                    <p style="color: #f1ad02; font-weight: bold; margin-bottom: 8px;">Métodos de Pago aceptados:</p>
                    <div style="display: flex; gap: 15px; font-size: 26px; color: white; align-items: center;">
                        <i class="fa-brands fa-cc-visa" style="color: #1a1f71;" title="Visa"></i>
                        <i class="fa-brands fa-cc-mastercard" style="color: #eb001b;" title="Mastercard"></i>
                        <i class="fa-solid fa-wallet" style="color: #009ee3;" title="Mercado Pago"></i>
                        <span style="background: #ff6600; color: white; font-size: 12px; padding: 4px 8px; border-radius: 4px; font-weight: bold;">Naranja X</span>
                    </div>
                </div>

                <!-- Botón Agregar al Carrito (localStorage) -->
                <button id="add-to-cart-btn" class="btn-buy-large" style="width: 100%; background: linear-gradient(135deg, #0051ff, #00bfff); color: white; border: none; padding: 15px; font-size: 18px; font-weight: bold; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 15px rgba(0,191,255,0.4); display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fa-solid fa-cart-shopping"></i> AGREGAR AL CARRITO
                </button>
            </div>
        </div>
    </main>

    <!-- Script de Carga Dinámica desde la API -->
    <script>
        const productId = <?php echo json_encode($id_producto); ?>;
        let productoActual = null;

        function actualizarContadorCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carritoBADE')) || [];
            document.getElementById('cart-count').textContent = carrito.reduce((acc, p) => acc + (p.cantidad || 1), 0);
        }
        actualizarContadorCarrito();

        fetch(`https://dummyjson.com/products/${productId}`)
            .then(res => res.json())
            .then(product => {
                productoActual = product;
                document.getElementById('detail-title').textContent = product.title;
                document.getElementById('detail-brand').textContent = product.brand ? `Marca: ${product.brand}` : `Categoría: ${product.category.toUpperCase()}`;
                
                const precio = product.price;
                document.getElementById('detail-price').textContent = `$${precio}`;
                document.getElementById('detail-description').textContent = product.description;

                const imgPrincipal = document.getElementById('detail-img');
                imgPrincipal.src = product.thumbnail || (product.images ? product.images[0] : '');
            })
            .catch(err => console.error("Error cargando producto:", err));

        document.getElementById('add-to-cart-btn').addEventListener('click', () => {
            if (!productoActual) return;
            
            let carrito = JSON.parse(localStorage.getItem('carritoBADE')) || [];
            const index = carrito.findIndex(p => p.id === productoActual.id);
            if (index !== -1) {
                carrito[index].cantidad += 1;
            } else {
                carrito.push({
                    id: productoActual.id,
                    title: productoActual.title,
                    price: productoActual.price,
                    thumbnail: productoActual.thumbnail || productoActual.images[0],
                    cantidad: 1
                });
            }

            localStorage.setItem('carritoBADE', JSON.stringify(carrito));
            actualizarContadorCarrito();
            alert('✨ ¡Éxito! Producto agregado a tu carrito en BADE.');
        });
    </script>
</body>
</html>