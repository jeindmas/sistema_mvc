<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="menu-links">
                <a href="index.php?controller=admin&action=dashboard">Inicio</a>
                <a href="index.php?controller=admin&action=crearUsuario">Crear Usuario</a>
                <a href="index.php?controller=admin&action=listarUsuarios">Listar Usuarios</a>
            </div>
            <div class="navbar-right">
                <span class="user-info">Bienvenido: <?php echo $_SESSION['admin_nombre']; ?></span>
                <a href="index.php?controller=login&action=logout" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
        
        <h1>Crear Nuevo Usuario</h1>
        
        <form action="index.php?controller=admin&action=guardarUsuario" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="cod">Código:</label>
                <input type="text" name="cod" id="cod" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <button type="submit" class="btn btn-success">Crear Usuario</button>
            <a href="index.php?controller=admin&action=dashboard" class="btn">Cancelar</a>
        </form>
    </div>
</body>
</html>
