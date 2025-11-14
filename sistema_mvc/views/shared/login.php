<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema MVC</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="container">
            <h1>Iniciar Sesión</h1>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            
            <form action="index.php?controller=login&action=procesar" method="POST">
                <div class="form-group">
                    <label for="tipo">Tipo de Usuario:</label>
                    <select name="tipo" id="tipo" required>
                        <option value="admin">Administrador</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="usuario">Usuario/Código:</label>
                    <input type="text" name="usuario" id="usuario" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <button type="submit">Ingresar</button>
            </form>
            
            <div style="margin-top: 20px; padding: 15px; background-color: #e7f3ff; border-radius: 4px;">
                <strong>Credenciales por defecto:</strong><br>
                Admin: usuario = <code>admin</code>, contraseña = <code>12345678</code>
            </div>
        </div>
    </div>
</body>
</html>
