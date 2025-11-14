<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
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
        
        <h1>Mis Usuarios Creados</h1>
        
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
        
        <a href="index.php?controller=admin&action=crearUsuario" class="btn btn-success">➕ Crear Nuevo Usuario</a>
        
        <?php if (count($usuarios) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['cod']); ?></td>
                            <td><?php echo $usuario['fecha_creacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="margin-top: 20px;">No has creado ningún usuario todavía.</p>
        <?php endif; ?>
    </div>
</body>
</html>
