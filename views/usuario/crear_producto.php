<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
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
        
        <h1>Crear Nuevo Producto</h1>
        
        <form action="index.php?controller=usuario&action=guardarProducto" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="serial">Serial:</label>
                <input type="text" name="serial" id="serial" required>
            </div>
            
            <button type="submit" class="btn btn-success">Crear Producto</button>
            <a href="index.php?controller=usuario&action=dashboard" class="btn">Cancelar</a>
        </form>
    </div>
</body>
</html>
