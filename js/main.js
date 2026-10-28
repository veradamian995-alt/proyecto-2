document.addEventListener('DOMContentLoaded', () => {
    console.log('Aplicación BADE inicializada y conectada a la API.');
    
    // Cargar los productos desde la Fake Store API
    fetchProducts();
});

async function fetchProducts() {
    const productsGrid = document.getElementById('products-grid');
    
    if (!productsGrid) return;

    // Mostrar un mensaje de carga provisional
    productsGrid.innerHTML = '<p style="color: white; grid-column: 1/-1; text-align: center;">Cargando productos desde la API...</p>';

    try {
        const response = await fetch('https://fakestoreapi.com/products?limit=4'); // Traemos 4 productos para el carrusel inicial
        const products = await response.json();

        // Limpiar el contenedor
        productsGrid.innerHTML = '';

        // Recorrer cada producto de la API y crear su tarjeta HTML
        products.forEach(product => {
            const productCard = document.createElement('article');
            productCard.classList.add('product-card');

            productCard.innerHTML = `
                <div class="product-image-container">
                    <img src="${product.image}" alt="${product.title}" class="product-img">
                </div>
                <div class="product-info-box">
                    <p class="product-title" title="${product.title}">${product.title}</p>
                    <span class="product-price">$${product.price.toLocaleString()}</span>
                    <a href="#" class="btn-buy" data-id="${product.id}">COMPRAR AHORA</a>
                </div>
            `;

            productsGrid.appendChild(productCard);
        });

        // Configurar eventos para los nuevos botones de compra generados
        initBuyButtons();

    } catch (error) {
        console.error('Error al obtener los productos de la API:', error);
        productsGrid.innerHTML = '<p style="color: #ff6b6b; grid-column: 1/-1; text-align: center;">Error al cargar los productos. Intente nuevamente.</p>';
    }
}

function initBuyButtons() {
    const buyButtons = document.querySelectorAll('.btn-buy');
    buyButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const productId = button.getAttribute('data-id');
            alert(`¡Producto con ID ${productId} agregado al carrito con éxito!`);
        });
    });
}
document.addEventListener('DOMContentLoaded', () => {
    // Configuración del Menú Lateral
    const settingsBtn = document.querySelector('.settings-btn');
    const closeSidebarBtn = document.getElementById('close-sidebar-btn');
    const sidebar = document.getElementById('settings-sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    // Abrir sidebar
    if (settingsBtn && sidebar) {
        settingsBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
        });
    }

    // Cerrar sidebar al dar clic en el engranaje interno o en el overlay
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    }
});