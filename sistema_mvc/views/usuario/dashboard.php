<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Usuario</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="menu-links">
                <a href="index.php?controller=usuario&action=dashboard">Inicio</a>
                <a href="index.php?controller=usuario&action=crearProducto">Crear Producto</a>
                <a href="index.php?controller=usuario&action=listarProductos">Listar Productos</a>
            </div>
            <div class="navbar-right">
                <span class="user-info">Bienvenido: <?php echo $_SESSION['usuario_nombre']; ?></span>
                <a href="index.php?controller=login&action=logout" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
        
        <h1>Panel de Usuario</h1>
        <p>Bienvenido al sistema de gestión de productos. Desde aquí puedes crear y administrar tus productos.</p>
        
        <div style="margin-top: 30px;">
            <h2>Opciones Disponibles:</h2>
            <ul style="list-style: none; padding: 0;">
                <li style="margin: 10px 0;">
                    <a href="index.php?controller=usuario&action=crearProducto" class="btn btn-success">➕ Crear Nuevo Producto</a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="index.php?controller=usuario&action=listarProductos" class="btn">📋 Ver Mis Productos</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
