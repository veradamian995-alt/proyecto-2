<?php
session_start();
$categoria_elegida = isset($_GET['cat']) ? $_GET['cat'] : 'general';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Categoría: <?php echo ucfirst($categoria_elegida); ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/images/logo-bade.png" alt="BADE Logo" class="logo-img-real">
                </a>
            </div>
            <div class="header-center">
                <a href="index.php" class="btn-back" style="color:white; text-decoration:none; background:#ff2222; padding:8px 15px; border-radius:5px;"><i class="fa-solid fa-arrow-left"></i> Volver al Inicio</a>
            </div>
        </div>
    </header>

    <!-- Sección de la Grilla de Productos -->
    <main class="main-content">
        <h2 class="section-title">PRODUCTOS DE <?php echo strtoupper($categoria_elegida); ?>:</h2>

        <!-- Contenedor de la Grilla Masiva -->
        <div class="products-grid" id="api-products-grid">
            <p style="color: white; text-align: center; grid-column: span 3;">Cargando catálogo completo...</p>
        </div>
    </main>

    <!-- Script para consumir la API de DummyJSON con gran variedad de productos -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const categoriaActual = "<?php echo strtolower($categoria_elegida); ?>";
            const gridContainer = document.getElementById("api-products-grid");

            // Solicitamos 100 productos para tener variedad de sobra en cada categoría
            fetch('https://dummyjson.com/products?limit=100')
                .then(response => response.json())
                .then(data => {
                    gridContainer.innerHTML = ""; 
                    const productos = data.products;
                    let productosAMostrar = [];

                    // Mapeamos nuestras categorías del menú a las categorías de la API
                    if (categoriaActual === 'tecnologia') {
                        productosAMostrar = productos.filter(p => p.category === 'smartphones' || p.category === 'laptops' || p.category === 'tablets');
                    } else if (categoriaActual === 'hogar') {
                        productosAMostrar = productos.filter(p => p.category === 'home-decoration' || p.category === 'furniture' || p.category === 'lighting');
                    } else if (categoriaActual === 'ropa') {
                        productosAMostrar = productos.filter(p => p.category.includes('mens') || p.category.includes('womens') || p.category === 'tops');
                    } else if (categoriaActual === 'deportes') {
                        productosAMostrar = productos.filter(p => p.category === 'sports-accessories' || p.category === 'vehicle' || p.category === 'groceries');
                    } else {
                        productosAMostrar = productos; // Si es 'mas', muestra todos
                    }

                    // Si alguna categoría queda corta, rellenamos con más productos para que la grilla luzca llena
                    if (productosAMostrar.length < 10) {
                        productosAMostrar = productos;
                    }

                    productosAMostrar.forEach(producto => {
                        const card = document.createElement("article");
                        card.classList.add("product-card");
                        
                        // Usamos la primera imagen del arreglo de imágenes que provee la API
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
                        gridContainer.appendChild(card);
                    });
                })
                .catch(error => {
                    console.error("Error al cargar la API:", error);
                    gridContainer.innerHTML = "<p style='color:white; text-align:center; grid-column:span 3;'>Error al conectar con el servidor de productos.</p>";
                });
        });
    </script>
</body>
</html>