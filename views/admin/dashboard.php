<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
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
        
        <h1>Panel de Administrador</h1>
        <p>Bienvenido al sistema de gestión. Desde aquí puedes crear y administrar usuarios.</p>
        
        <div style="margin-top: 30px;">
            <h2>Opciones Disponibles:</h2>
            <ul style="list-style: none; padding: 0;">
                <li style="margin: 10px 0;">
                    <a href="index.php?controller=admin&action=crearUsuario" class="btn btn-success">➕ Crear Nuevo Usuario</a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="index.php?controller=admin&action=listarUsuarios" class="btn">📋 Ver Mis Usuarios</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
