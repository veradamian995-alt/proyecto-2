<?php
session_start();
// Aquí abajo ya puede ir el resto del código HTML de tu página
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Tienda en Línea</title>
    <!-- CSS Principal -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- FontAwesome para Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<!-- Panel Lateral / Menú de Configuración (Desde la izquierda) -->
    <div id="settings-sidebar" class="sidebar">
        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        
        <div class="sidebar-content">
            <!-- Header del Panel -->
            <div class="sidebar-header">
                <div class="sidebar-title-box">
                    <img src="assets/images/logo-bade.png" alt="BADE Logo" class="sidebar-logo">
                    <span>MENÚ DE CONFIGURACIÓN</span>
                </div>
                <button class="close-sidebar-btn" id="close-sidebar-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Cuerpo del Panel -->
            <div class="sidebar-body">
                <!-- Sección Ajustes -->
                <div class="sidebar-section">
                    <div class="badge-title">AJUSTES</div>
                    <ul class="sidebar-list">
                        <li><a href="#">Lorem ipsum bla bla bla</a></li>
                        <li><a href="#">Loremmmemememem</a></li>
                        <li><a href="#">lololorererem</a></li>
                        <li><a href="#">loremerolorem</a></li>
                        <li><a href="#">lorelorelorelorem</a></li>
                    </ul>
                </div>

                <!-- Sección Contactos -->
                <div class="sidebar-section">
                    <div class="badge-title">CONTACTOS</div>
                    <div class="contacts-grid">
                        <div class="contact-item">
                            <a href="https://wa.me/" target="_blank" class="social-icon whatsapp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <span>+54 bla bla bla</span>
                        </div>
                        <div class="contact-item">
                            <a href="#" class="social-icon instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <span>blablablabla</span>
                        </div>
                        <div class="contact-item">
                            <a href="#" class="social-icon facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <span>blablablabla</span>
                        </div>
                    </div>
                </div>

                <!-- Sección Privacidad -->
                <div class="sidebar-section">
                    <h3 class="privacy-title">Privacidad:</h3>
                    <ul class="privacy-list">
                        <li>Lorem ipsum bla bla bla</li>
                        <li>Loremmmemememem</li>
                        <li>lololorererem</li>
                        <li>loremerolorem</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<body>

    <!-- Encabezado / Header -->
    <header class="header">
        <div class="header-container">
           <!-- Logo BADE -->
<div class="logo">
    <a href="index.php">
        <img src="assets/images/logo-bade.png" alt="BADE Logo" class="logo-img-real">
    </a>
</div>

            <!-- Lemas / Ajustes -->
            <div class="header-center">
                <button class="settings-btn" title="Configuración">
                    <i class="fa-solid fa-gear"></i>
                </button>
                <span class="slogan">Tu satisfacción es nuestra mayor recompensa.</span>
            </div>

       
        
        
<!-- Acciones de Usuario en el Header -->
<div class="user-actions">
    <?php if (isset($_SESSION['nombre_usuario'])): ?>
        <!-- Si el usuario YA inició sesión: muestra su nombre y avatar circular -->
        <div class="logged-user-info" style="display: flex; align-items: center; gap: 10px;">
            <span class="user-name-display" style="color: white; font-weight: bold; font-size: 15px;">
                <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>
            </span>
            <div class="user-avatar-real" style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; border: 2px solid #f1ad02;">
                <img src="assets/images/default-avatar.png" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://cdn-icons-png.flaticon.com/512/847/847969.png'">
            </div>
            <a href="logout.php" title="Cerrar sesión" style="color: #ff5555; margin-left: 5px; font-size: 16px;"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    <?php else: ?>
        <!-- Si NO ha iniciado sesión: muestra los botones normales -->
        <a href="login.html" class="btn btn-login">Iniciar sesión</a>
        <a href="register.html" class="btn btn-register">Registrarse</a>
        <div class="user-avatar">
            <i class="fa-solid fa-user"></i>
        </div>
    <?php endif; ?>
</div>
    </header>

    <!-- Barra de Categorías -->
    <nav class="categories-nav">
        <div class="categories-container">
            <span class="categories-title">CATEGORÍAS:</span>
            <div class="categories-buttons">
               <a href="#" class="cat-btn disabled-link">TECNOLOGÍA</a>
            <a href="#" class="cat-btn disabled-link">HOGAR</a>
            <a href="#" class="cat-btn disabled-link">ROPA</a>
            <a href="#" class="cat-btn disabled-link">DEPORTES</a>
            <a href="#" class="cat-btn disabled-link">MÁS...</a>
            </div>
        </div>
    </nav>

    <!-- Sección Principal de Productos -->
    <main class="main-content">
        <h2 class="section-title">PRODUCTOS:</h2>

        <div class="products-carousel-wrapper">
            <div class="products-grid" id="products-grid">
                
                <!-- Tarjeta de Producto 1 -->
                <article class="product-card">
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/300x200" alt="Mueble Oficina" class="product-img">
                    </div>
                    <div class="product-info-box">
                        <p class="product-title">Mueble Oficina con Repisa Flotante - Ciudad Muebles</p>
                        <span class="product-price">$125.000</span>
                        <a href="#" class="btn-buy">COMPRAR AHORA</a>
                    </div>
                </article>

                <!-- Tarjeta de Producto 2 -->
                <article class="product-card">
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/300x200" alt="Licuadora Professional" class="product-img">
                    </div>
                    <div class="product-info-box">
                        <p class="product-title">Licuadora Professional Blender 2 L 4500W 15 velocidades</p>
                        <span class="product-price">$85.900</span>
                        <a href="#" class="btn-buy">COMPRAR AHORA</a>
                    </div>
                </article>

                <!-- Tarjeta de Producto 3 -->
                <article class="product-card">
                    <div class="product-image-container">
                        <img src="https://via.placeholder.com/300x200" alt="PC Intel Gamer" class="product-img">
                    </div>
                    <div class="product-info-box">
                        <p class="product-title">PC Intel Gamer Kairos Essential i7 14700 32GB SSD 480GB</p>
                        <span class="product-price">$890.000</span>
                        <a href="#" class="btn-buy">COMPRAR AHORA</a>
                    </div>
                </article>

            </div>

            <!-- Botón Flecha Carrusel -->
            <button class="carousel-arrow right-arrow">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <!-- Botón Ver Todo -->
        <div class="more-products-container">
            <button class="btn-show-all">Mostrar lista Completa</button>
        </div>
    </main>

    <!-- Botón Flotante para Cambiar Tema -->
    <div class="theme-toggle-container">
        <button class="theme-toggle-btn">
            <i class="fa-solid fa-sun"></i>
        </button>
        <span class="theme-label">cambiar a tema claro</span>
    </div>

    <!-- JavaScript Principal -->
    <script src="js/main.js"></script>
</body>
</html>