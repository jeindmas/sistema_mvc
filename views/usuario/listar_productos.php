<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Productos</title>
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
        
        <h1>Mis Productos Creados</h1>
        
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        
        <a href="index.php?controller=usuario&action=crearProducto" class="btn btn-success">➕ Crear Nuevo Producto</a>
        
        <?php if (count($productos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Serial</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo $producto['id']; ?></td>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($producto['serial']); ?></td>
                            <td><?php echo $producto['fecha_creacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="margin-top: 20px;">No has creado ningún producto todavía.</p>
        <?php endif; ?>
    </div>
</body>
</html>
