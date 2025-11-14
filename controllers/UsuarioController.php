<?php
require_once 'models/Producto.php';

class UsuarioController {
    
    // Verificar que el usuario esté logueado
    private function verificarSesion() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit();
        }
    }
    
    // Dashboard del usuario
    public function dashboard() {
        $this->verificarSesion();
        require_once 'views/usuario/dashboard.php';
    }
    
    // Mostrar formulario para crear producto
    public function crearProducto() {
        $this->verificarSesion();
        require_once 'views/usuario/crear_producto.php';
    }
    
    // Procesar creación de producto
    public function guardarProducto() {
        $this->verificarSesion();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $serial = $_POST['serial'];
            
            $productoModel = new Producto();
            
            try {
                if ($productoModel->crear($nombre, $serial, $_SESSION['usuario_id'])) {
                    $_SESSION['success'] = 'Producto creado exitosamente';
                } else {
                    $_SESSION['error'] = 'Error al crear el producto';
                }
            } catch (Exception $e) {
                $_SESSION['error'] = 'Error: El serial del producto ya existe';
            }
            
            header('Location: index.php?controller=usuario&action=listarProductos');
            exit();
        }
    }
    
    // Listar productos creados por este usuario
    public function listarProductos() {
        $this->verificarSesion();
        
        $productoModel = new Producto();
        $productos = $productoModel->listarPorUsuario($_SESSION['usuario_id']);
        
        require_once 'views/usuario/listar_productos.php';
    }
}
?>
