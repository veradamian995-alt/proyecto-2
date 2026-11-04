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
            <a href="usuarios/logout.php" title="Cerrar sesión" style="color: #ff5555; margin-left: 5px; font-size: 16px;"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    <?php else: ?>
        <!-- Si NO ha iniciado sesión: muestra los botones normales -->
        <a href="usuarios/login.php" class="btn btn-login">Iniciar sesión</a>
        <a href="usuarios/register.php" class="btn btn-register">Registrarse</a>
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
            <a href="categoria.php?cat=tecnologia" class="cat-btn">TECNOLOGÍA</a>
            <a href="categoria.php?cat=hogar" class="cat-btn">HOGAR</a>
            <a href="categoria.php?cat=ropa" class="cat-btn">ROPA</a>
            <a href="categoria.php?cat=deportes" class="cat-btn">DEPORTES</a>
            <a href="categoria.php?cat=mas" class="cat-btn">MÁS...</a>
        </div>
    </div>
</nav>
    <!-- Sección Principal de Productos -->
    <main class="main-content">
        <h2 class="section-title">PRODUCTOS:</h2>

        <div class="products-carousel-wrapper">
            <div class="products-grid" id="products-grid">
                
                

            </div>

            <!-- Botón Flecha Carrusel -->
            <button class="carousel-arrow right-arrow">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        
    </main>

    <!-- Botón Flotante para Cambiar Tema -->
    <div class="floating-theme-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; text-align: center;">
    <button id="theme-toggle-btn" style="background: #00bfff; border: 2px solid white; border-radius: 50%; width: 50px; height: 50px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
        ☀️
    </button>
    <span id="theme-text" style="color: white; font-size: 12px; font-weight: bold; background: rgba(0,0,0,0.6); padding: 2px 6px; border-radius: 4px;">cambiar a tema claro</span>
</div>

    <!-- JavaScript Principal -->
    <script src="js/main.js"></script>
</body>
</html>
<!-- Sección Principal del Home -->
<main class="main-content">
    <h2 class="section-title">PRODUCTOS DESTACADOS:</h2>

    <!-- Grilla con los 3 productos destacados -->
    <div class="products-grid" id="products-grid">
        <article class="product-card">
            <div class="product-image-container">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" alt="Reloj Minimalista" class="product-img">
            </div>
            <div class="product-info-box">
                <p class="product-title">Reloj Minimalista Moderno</p>
                <span class="product-price">$45.000</span>
                <a href="#" class="btn-buy">COMPRAR AHORA</a>
            </div>
        </article>

        <article class="product-card">
            <div class="product-image-container">
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" alt="Auriculares Bluetooth" class="product-img">
            </div>
            <div class="product-info-box">
                <p class="product-title">Auriculares Bluetooth Pro</p>
                <span class="product-price">$32.500</span>
                <a href="#" class="btn-buy">COMPRAR AHORA</a>
            </div>
        </article>

        <article class="product-card">
            <div class="product-image-container">
                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f" alt="Cámara Vintage" class="product-img">
            </div>
            <div class="product-info-box">
                <p class="product-title">Cámara Fotográfica Compacta</p>
                <span class="product-price">$120.000</span>
                <a href="#" class="btn-buy">COMPRAR AHORA</a>
            </div>
        </article>
    </div>

    <!-- ÚNICO BOTÓN PARA MOSTRAR LISTA COMPLETA -->
    <div class="more-products-container" style="text-align: center; margin: 40px 0;">
        <button id="btn-show-all" class="btn-show-all" style="background: #666; color: white; padding: 12px 30px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; transition: background 0.3s;">
            Mostrar lista completa
        </button>
    </div>

    <!-- SECCIONES COMPLETAS DEL CATÁLOGO (Ocultas al inicio) -->
    <div id="full-catalog-section" style="display: none; margin-top: 50px;">
        
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

        <!-- DEPORTES -->
        <section class="home-category-section" style="margin-bottom: 40px;">
            <h2 class="section-title" style="color: #f1ad02; border-bottom: 2px solid #f1ad02; padding-bottom: 10px;">DEPORTES</h2>
            <div class="products-grid" id="home-deportes-grid">
                <p style="color: white; text-align: center;">Cargando deportes...</p>
            </div>
        </section>

        <!-- ROPA -->
        <section class="home-category-section" style="margin-bottom: 40px;">
            <h2 class="section-title" style="color: #f1ad02; border-bottom: 2px solid #f1ad02; padding-bottom: 10px;">ROPA</h2>
            <div class="products-grid" id="home-ropa-grid">
                <p style="color: white; text-align: center;">Cargando ropa...</p>
            </div>
        </section>

    </div>

</main>

<!-- FOOTER OFICIAL (Basado en tu imagen de referencia) -->
<footer class="site-footer" style="background-color: #030825; padding: 40px 20px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: 60px; color: #8892b0;">
    <div class="footer-container" style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Enlaces principales del footer -->
        <div class="footer-links" style="display: flex; justify-content: space-around; text-align: center; margin-bottom: 30px; font-size: 18px; font-weight: bold;">
            <a href="#" style="color: #a8b2d1; text-decoration: none;">Contactanos</a>
            <a href="#" style="color: #a8b2d1; text-decoration: none;">Nosotros</a>
            <a href="#" style="color: #a8b2d1; text-decoration: none;">Política de privacidad</a>
        </div>

        <!-- Texto institucional / Lorem Ipsum del footer -->
        <div class="footer-text" style="font-size: 13px; line-height: 1.6; text-align: justify; color: #64ffda; opacity: 0.7;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget massa tellus. Donec sit amet est at ante eleifend lacinia eget eget orci. Fusce in rhoncus nibh. Praesent mi ex, dignissim ac elit eu, vulputate bibendum est. Maecenas pellentesque feugiat massa at tristique. Nullam sagittis blandit massa, quis semper nulla. Aenean interdum odio mi, vitae mattis urna suscipit a.</p>
            <p style="margin-top: 10px;">Morbi sagittis porta lorem, non vehicula ex congue eu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc non risus viverra, interdum felis eu, porta leo. Fusce vitae massa quam. Ut vestibulum turpis tellus, sed dictum felis efficitur in. Dui sapien quam, porta nec tellus eget, vulputate suscipit felis. Mauris posuere non quam ullamcorper tempus. Proin nec metus facilisis, aliquet nisi tincidunt, placerat nibh. Praesent blandit est nec mi placerat efficitur. Donec elit lectus, convallis sed ultrices sit amet, gravida et lectus. Sed nibh nisi, tincidunt at consequat in, ultrices ac velit. Morbi sollicitudin ultrices luctus. Proin at faucibus est. Nunc quam massa, faucibus non ligula pulvinar, aliquam viverra arcu. Nullam venenatis nec eros tempus aliquet. Nam elit est, porta pellentesque fe.</p>
        </div>

    </div>
</footer>

<!-- Script para el botón y carga completa garantizada de las categorías restantes -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btnShowAll = document.getElementById("btn-show-all");
        const fullCatalog = document.getElementById("full-catalog-section");
        let datosCargados = false;

        if (btnShowAll && fullCatalog) {
            btnShowAll.addEventListener("click", () => {
                if (fullCatalog.style.display === "none") {
                    fullCatalog.style.display = "block";
                    btnShowAll.textContent = "Ocultar lista completa";
                    
                    fullCatalog.scrollIntoView({ behavior: 'smooth' });

                    if (!datosCargados) {
                        fetch('https://dummyjson.com/products?limit=100')
                            .then(response => response.json())
                            .then(data => {
                                const productos = data.products;

                                function renderizarGrid(productosArray, contenedorId, limite = 4) {
                                    const contenedor = document.getElementById(contenedorId);
                                    if (!contenedor) return;
                                    contenedor.innerHTML = "";

                                    const itemsAUsar = productosArray.length > 0 ? productosArray : productos;

                                    itemsAUsar.slice(0, limite).forEach(producto => {
                                        const card = document.createElement("article");
                                                
                                        
                                        const imagenProd = producto.images && producto.images.length > 0 ? producto.images[0] : producto.thumbnail;

                                        card.innerHTML = `
                                            <div class="product-image-container">
                                                <img src="${imagenProd}" alt="${producto.title}" class="product-img">
                                            </div>
                                            <div class="product-info-box">
                                                <p class="product-title">${producto.title}</p>
                                                <span class="product-price">$${producto.price}</span>
                                                <a href="#" class="btn-buy">COMPRAR AHORA</a>
                                            </div>
                                        `;
                                        contenedor.appendChild(card);
                                    });
                                }

                                // Filtros activos (Hogar, Tecnología y Ropa - Deportes eliminado)
                                renderizarGrid(productos.filter(p => p.category === 'home-decoration' || p.category === 'furniture' || p.category === 'lighting'), 'home-hogar-grid');
                                renderizarGrid(productos.filter(p => p.category === 'smartphones' || p.category === 'laptops' || p.category === 'tablets' || p.category === 'mobile-accessories'), 'home-tecnologia-grid');
                                renderizarGrid(productos.filter(p => p.category.includes('mens') || p.category.includes('womens') || p.category === 'tops' || p.category === 'sunglasses'), 'home-ropa-grid');

                                datosCargados = true;
                            })
                            .catch(error => console.error("Error al cargar el catálogo:", error));
                    }
                } else {
                    fullCatalog.style.display = "none";
                    btnShowAll.textContent = "Mostrar lista completa";
                }
            });
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const themeBtn = document.getElementById("theme-toggle-btn");
        const themeText = document.getElementById("theme-text");
        let esClaro = false;

        if (themeBtn) {
            themeBtn.addEventListener("click", () => {
                esClaro = !esClaro;
                
                if (esClaro) {
                    // Cambiar a Tema Claro
                    document.body.style.backgroundColor = "#f4f4f4";
                    document.body.style.color = "#333333";
                    themeText.textContent = "cambiar a tema oscuro";
                    themeBtn.textContent = "🌙";
                    
                    // Ajustar textos principales si es necesario para que se vean en fondo claro
                    document.querySelectorAll('.section-title').forEach(el => el.style.color = "#030825");
                } else {
                    // Volver a Tema Oscuro (Original)
                    document.body.style.backgroundColor = "#030825"; // O tu color de fondo oscuro original
                    document.body.style.color = "#ffffff";
                    themeText.textContent = "cambiar a tema claro";
                    themeBtn.textContent = "☀️";
                    
                    document.querySelectorAll('.section-title').forEach(el => el.style.color = "#f1ad02");
                }
            });
        }
    });
</script>