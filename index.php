<?php
session_start();
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
<body>
    <!-- Panel Lateral / Menú de Configuración (Desde la izquierda) -->
    <div id="settings-sidebar" class="sidebar">
        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        <div class="sidebar-content">
            <div class="sidebar-header">
                <div class="sidebar-title-box">
                    <img src="assets/images/logo-bade.png" alt="BADE Logo" class="sidebar-logo">
                    <span>MENÚ DE CONFIGURACIÓN</span>
                </div>
                <button class="close-sidebar-btn" id="close-sidebar-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="sidebar-body">
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

    <!-- Encabezado / Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                 <a href="index.php">
                    <img src="assets/images/logo-bade.png" alt="BADE Logo" class="logo-img-real">
                 </a>
            </div>

            <div class="header-center">
                <button class="settings-btn" title="Configuración">
                    <i class="fa-solid fa-gear"></i>
                </button>
                <span class="slogan">Tu satisfacción es nuestra mayor recompensa.</span>
            </div>

            <!-- Acciones de Usuario en el Header -->
            <div class="user-actions" style="display: flex; align-items: center; gap: 15px;">
                <a href="tienda/carrito.php" style="color: #64ffda; text-decoration: none; font-weight: bold; position: relative; font-size: 20px;">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="cart-count" style="background: #ff2222; color: white; border-radius: 50%; padding: 2px 7px; font-size: 11px; position: absolute; top: -8px; right: -12px;">0</span>
                </a>

                <?php if (isset($_SESSION['nombre_usuario'])): ?>
                    <div class="logged-user-info" style="display: flex; align-items: center; gap: 10px;">
                        <span class="user-name-display" style="color: white; font-weight: bold; font-size: 15px;">
                            <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>
                        </span>
                        <!-- Al hacer clic, la página baja automáticamente hasta la sección del perfil -->
                        <a href="#mi-perfil-seccion" title="Ver mi Perfil" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px solid #f1ad02; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #f1ad02; font-size: 18px; text-decoration: none;">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="usuarios/logout.php" title="Cerrar sesión" style="color: #ff5555; margin-left: 5px; font-size: 16px;"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                <?php else: ?>
                    <a href="usuarios/login.php" class="btn btn-login">Iniciar sesión</a>
                    <a href="usuarios/register.php" class="btn btn-register">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Barra de Categorías -->
    <nav class="categories-nav">
        <div class="categories-container">
            <span class="categories-title">CATEGORÍAS:</span>
            <div class="categories-buttons">
                <a href="categoria.php?cat=tecnologia" class="cat-btn">TECNOLOGÍA</a>
                <a href="categoria.php?cat=hogar" class="cat-btn">HOGAR</a>
                <a href="categoria.php?cat=ropa" class="cat-btn">ROPA</a>
                <a href="categoria.php?cat=belleza" class="cat-btn">BELLEZA</a>
                <a href="categoria.php?cat=mas" class="cat-btn">MÁS...</a>
            </div>
        </div>
    </nav>

    <!-- Sección Principal -->
    <main class="main-content" style="margin-top: 30px;">
        <!-- HOGAR -->
        <section class="home-category-section" style="margin-bottom: 40px;">
            <h2 class="section-title" style="color: #f1ad02; border-bottom: 2px solid #f1ad02; padding-bottom: 10px;">HOGAR</h2>
            <div class="products-grid" id="home-hogar-grid">
                <p style="color: white; text-align: center;">Cargando hogar...</p>
            </div>
        </section>

        <!-- TECNOLOGÍA -->
        <section class="home-category-section" style="margin-bottom: 40px;">
            <h2 class="section-title" style="color: #f1ad02; border-bottom: 2px solid #f1ad02; padding-bottom: 10px;">TECNOLOGÍA</h2>
            <div class="products-grid" id="home-tecnologia-grid">
                <p style="color: white; text-align: center;">Cargando tecnología...</p>
            </div>
        </section>

        <!-- ROPA -->
        <section class="home-category-section" style="margin-bottom: 40px;">
            <h2 class="section-title" style="color: #f1ad02; border-bottom: 2px solid #f1ad02; padding-bottom: 10px;">ROPA</h2>
            <div class="products-grid" id="home-ropa-grid">
                <p style="color: white; text-align: center;">Cargando ropa...</p>
            </div>
        </section>

        <!-- Botón Flotante para Cambiar Tema -->
        <div class="floating-theme-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; text-align: center;">
            <button id="theme-toggle-btn" style="background: #00bfff; border: 2px solid white; border-radius: 50%; width: 50px; height: 50px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
                ☀️
            </button>
            <span id="theme-text" style="color: white; font-size: 12px; font-weight: bold; background: rgba(0,0,0,0.6); padding: 2px 6px; border-radius: 4px;">cambiar a tema claro</span>
        </div>
    </main>

    <!-- SECCIÓN DE PERFIL FIJA (UBICADA EXACTAMENTE ANTES DEL FOOTER) -->
    <section id="mi-perfil-seccion" style="max-width: 600px; margin: 60px auto 40px auto; padding: 0 20px; scroll-margin-top: 40px;">
        <div style="background: rgba(255,255,255,0.03); padding: 30px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); text-align: center;">
            
            <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px solid #f1ad02; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; color: #f1ad02; font-size: 28px;">
                <i class="fa-solid fa-user"></i>
            </div>

            <h3 style="color: #f1ad02; margin-bottom: 15px; font-size: 22px;">MI PERFIL DE USUARIO</h3>

            <?php if (isset($_SESSION['nombre_usuario'])): ?>
                <div style="text-align: left; background: rgba(0,0,0,0.3); padding: 20px; border-radius: 8px; margin-bottom: 20px; display: flex; flex-direction: column; gap: 10px; color: #fff;">
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></p>
                    <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($_SESSION['usuario'] ?? ''); ?></p>
                    <p><strong>Dirección de entrega:</strong> <?php echo htmlspecialchars($_SESSION['direccion'] ?? 'No registrada'); ?></p>
                </div>

                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="tienda/historial.php" style="background: #00bfff; color: #030825; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                        <i class="fa-solid fa-clock-rotate-left"></i> Ver Historial de Compras
                    </a>
                    <a href="usuarios/logout.php" style="background: #ff5555; color: white; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                    </a>
                </div>
            <?php else: ?>
                <p style="color: #a8b2d1; margin-bottom: 15px;">No has iniciado sesión en BADE.</p>
                <a href="usuarios/login.php" style="background: #0051ff; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; display: inline-block;">Iniciar Sesión</a>
            <?php endif; ?>

        </div>
    </section>

    <!-- FOOTER OFICIAL -->
    <footer class="site-footer" style="background-color: #030825; padding: 40px 20px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: 20px; color: #8892b0;">
        <div class="footer-container" style="max-width: 1200px; margin: 0 auto;">
            <div class="footer-links" style="display: flex; justify-content: space-around; text-align: center; margin-bottom: 30px; font-size: 18px; font-weight: bold;">
                <a href="#" style="color: #a8b2d1; text-decoration: none;">Contactanos</a>
                <a href="#" style="color: #a8b2d1; text-decoration: none;">Nosotros</a>
                <a href="#" style="color: #a8b2d1; text-decoration: none;">Política de privacidad</a>
            </div>
            <div class="footer-text" style="font-size: 13px; line-height: 1.6; text-align: justify; color: #64ffda; opacity: 0.7;">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS DE LA PÁGINA -->
    <script>
        // Contador del Carrito corregido
        document.addEventListener("DOMContentLoaded", () => {
            const carrito = JSON.parse(localStorage.getItem('carritoBADE')) || [];
            const contador = document.getElementById('cart-count');
            if(contador) {
                contador.textContent = carrito.reduce((acc, p) => acc + (p.cantidad || 1), 0);
            }
        });

        // Carga Automática de Productos en el Home
        function renderizarGrid(productosArray, contenedorId, limite = 4) {
            const contenedor = document.getElementById(contenedorId);
            if (!contenedor) return;
            contenedor.innerHTML = "";

            productosArray.slice(0, limite).forEach(producto => {
                const card = document.createElement("article");
                card.classList.add("product-card");
                const imagenProd = producto.images && producto.images.length > 0 ? producto.images[0] : producto.thumbnail;

                card.innerHTML = `
                    <div class="product-image-container">
                        <a href="tienda/producto.php?id=${producto.id}">
                            <img src="${imagenProd}" alt="${producto.title}" class="product-img">
                        </a>
                    </div>
                    <div class="product-info-box">
                        <p class="product-title">${producto.title}</p>
                        <span class="product-price">$${producto.price}</span>
                        <a href="tienda/producto.php?id=${producto.id}" class="btn-buy" style="text-decoration: none; display: inline-block; text-align: center;">COMPRAR AHORA</a>
                    </div>
                `;
                contenedor.appendChild(card);
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            fetch('https://dummyjson.com/products?limit=100')
                .then(response => response.json())
                .then(data => {
                    const productos = data.products;
                    renderizarGrid(productos.filter(p => p.category === 'home-decoration' || p.category === 'furniture' || p.category === 'lighting'), 'home-hogar-grid', 4);
                    renderizarGrid(productos.filter(p => p.category === 'smartphones' || p.category === 'laptops' || p.category === 'tablets' || p.category === 'mobile-accessories'), 'home-tecnologia-grid', 4);
                    renderizarGrid(productos.filter(p => p.category.includes('mens') || p.category.includes('womens') || p.category === 'tops' || p.category === 'sunglasses'), 'home-ropa-grid', 4);
                })
                .catch(error => console.error("Error al cargar el catálogo:", error));
        });

        // Cambio de tema claro/oscuro
        document.addEventListener("DOMContentLoaded", () => {   
            const themeBtn = document.getElementById("theme-toggle-btn");
            const themeText = document.getElementById("theme-text");
            let esClaro = false;

            if (themeBtn) {
                themeBtn.addEventListener("click", () => {
                    esClaro = !esClaro;
                    if (esClaro) {
                        document.body.style.backgroundColor = "#f4f4f4";
                        document.body.style.color = "#333333";
                        themeText.textContent = "cambiar a tema oscuro";
                        themeBtn.textContent = "🌙";
                        document.querySelectorAll('.section-title').forEach(el => el.style.color = "#030825");
                    } else {
                        document.body.style.backgroundColor = "#030825";
                        document.body.style.color = "#ffffff";
                        themeText.textContent = "cambiar a tema claro";
                        themeBtn.textContent = "☀️";
                        document.querySelectorAll('.section-title').forEach(el => el.style.color = "#f1ad02");
                    }
                });
            }
        });
    </script>

    <!-- JavaScript Principal -->
    <script src="js/main.js"></script>
</body>
</html>