<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BADE - Registro</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-body">

    <div class="auth-card">
        <!-- Logo Header -->                                    
        <div class="auth-logo">
            <a href="../index.php">
                <img src="../assets/images/logo-bade.png" alt="BADE Logo" class="auth-logo-img">
            </a>
        </div>

        <form action="registrar_usuario.php" method="POST" id="register-form" class="auth-form">
        

           <!-- Campo Mail -->
            <div class="input-group">
                <input type="email" name="email" id="reg-email" placeholder="mail..." required 
                       oninvalid="this.setCustomValidity('Por favor, ingresa tu correo electrónico para registrarte en BADE.');" 
                       oninput="this.setCustomValidity('');">
            </div>

            <!-- Campo Contraseña -->
            <div class="input-group">
                <input type="password" name="password" id="reg-password" placeholder="Contraseña..." required 
                       oninvalid="this.setCustomValidity('Por favor, ingresa una contraseña.');" 
                       oninput="this.setCustomValidity('');">
            </div>

            <!-- Campo Teléfono -->
            <div class="input-group">
                <input type="tel" name="telefono" id="reg-phone" placeholder="Teléfono..." required 
                       oninvalid="this.setCustomValidity('Por favor, completa tu número de teléfono.');" 
                       oninput="this.setCustomValidity('');">
            </div>

            <!-- Campo Dirección -->
            <div class="input-group">
                <input type="text" name="direccion" placeholder="Dirección de entrega (Calle, Número, Ciudad)..." required 
                       oninvalid="this.setCustomValidity('Por favor, ingresa tu dirección de entrega.');" 
                       oninput="this.setCustomValidity('');">
            </div>

            

            <!-- Botones de Acción -->
            <div class="auth-buttons">
                <a href="../index.php" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn-submit">Enviar</button>
            </div>

            <!-- Enlace a Login -->
            <div class="auth-link">
                <a href="login.php">¿ya tienes una cuenta?</a>
            </div>
        </form>
    </div>

    <script src="../js/main.js"></script>
</body>
</html>