<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Mi Carrito</title>
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
                <a href="../index.php" class="btn-back" style="color:white; text-decoration:none; background:#ff2222; padding:8px 15px; border-radius:5px;"><i class="fa-solid fa-arrow-left"></i> Seguir Comprando</a>
            </div>
        </div>
    </header>

    <main class="main-content" style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
        <h2 style="color: #f1ad02; margin-bottom: 20px;"><i class="fa-solid fa-cart-shopping"></i> MI CARRITO DE COMPRAS</h2>
        
        <div id="cart-container" style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
            <!-- Se carga dinámicamente con JS -->
        </div>

        <form action="procesar_venta.php" method="POST" id="checkout-form" style="display: none; margin-top: 30px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 8px;">
            <input type="hidden" name="productos_json" id="productos_json">
            <input type="hidden" name="total" id="input-total">

            <div style="margin-bottom: 20px;">
                <label style="color: #64ffda; font-weight: bold; display: block; margin-bottom: 8px;"><i class="fa-solid fa-truck"></i> Elegí la forma de Entrega:</label>
                <select name="forma_entrega" required style="width: 100%; padding: 10px; border-radius: 6px; background: #030825; color: white; border: 1px solid #00bfff;">
                    <option value="Envio a domicilio (Usar dirección de perfil)">Envío a Domicilio Estándar</option>
                    <option value="Retiro en sucursal BADE">Retiro en Sucursal BADE</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="color: #f1ad02; font-weight: bold; display: block; margin-bottom: 8px;">Elegí tu método de Pago:</label>
                <select name="metodo_pago" required style="width: 100%; padding: 10px; border-radius: 6px; background: #030825; color: white; border: 1px solid #f1ad02;">
                    <option value="Visa">Visa</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Mercado Pago">Mercado Pago</option>
                    <option value="Naranja X">Naranja X</option>
                </select>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255,255,255,0.1); pt: 15px;">
                <h3 style="font-size: 22px; color: #64ffda; margin: 0;">Total: $<span id="cart-total">0</span></h3>
                <button type="submit" style="background: linear-gradient(135deg, #0051ff, #00bfff); color: white; border: none; padding: 12px 25px; border-radius: 8px; font-weight: bold; cursor: pointer;">FINALIZAR COMPRA</button>
            </div>
        </form>
    </main>

    <script>
        function cargarCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carritoBADE')) || [];
            const container = document.getElementById('cart-container');
            const checkoutForm = document.getElementById('checkout-form');

            if (carrito.length === 0) {
                container.innerHTML = '<p style="text-align: center; color: #a8b2d1;">El carrito está vacío.</p>';
                checkoutForm.style.display = 'none';
                return;
            }

            let html = '<div style="display: flex; flex-direction: column; gap: 15px;">';
            let total = 0;

            carrito.forEach((prod, idx) => {
                const subtotal = prod.price * prod.cantidad;
                total += subtotal;

                html += `
                    <div style="display: flex; align-items: center; justify-content: space-between; background: rgba(0,0,0,0.3); padding: 15px; border-radius: 8px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img src="${prod.thumbnail}" style="width: 50px; height: 50px; object-fit: contain;">
                            <div>
                                <strong style="color: #fff;">${prod.title}</strong>
                                <p style="font-size: 13px; color: #64ffda;">$${prod.price} x ${prod.cantidad}</p>
                            </div>
                        </div>
                        <div>
                            <span style="font-size: 16px; font-weight: bold; margin-right: 15px; color: #fff;">$${subtotal}</span>
                            <button type="button" onclick="eliminarItem(${idx})" style="background: transparent; color: #ff5555; border: none; cursor: pointer; font-size: 18px;"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                `;
            });

            html += '</div>';
            container.innerHTML = html;
            document.getElementById('cart-total').textContent = total.toLocaleString();
            document.getElementById('input-total').value = total;
            document.getElementById('productos_json').value = JSON.stringify(carrito);
            checkoutForm.style.display = 'block';
        }

        function eliminarItem(index) {
            let carrito = JSON.parse(localStorage.getItem('carritoBADE')) || [];
            carrito.splice(index, 1);
            localStorage.setItem('carritoBADE', JSON.stringify(carrito));
            cargarCarrito();
        }

        document.addEventListener('DOMContentLoaded', cargarCarrito);
    </script>
</body>
</html>