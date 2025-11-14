<?php
require_once 'models/Usuario.php';

class AdminController {
    
    // Verificar que el usuario sea administrador
    private function verificarSesion() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit();
        }
    }
    
    // Dashboard del administrador
    public function dashboard() {
        $this->verificarSesion();
        require_once 'views/admin/dashboard.php';
    }
    
    // Mostrar formulario para crear usuario
    public function crearUsuario() {
        $this->verificarSesion();
        require_once 'views/admin/crear_usuario.php';
    }
    
    // Procesar creación de usuario
    public function guardarUsuario() {
        $this->verificarSesion();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $cod = $_POST['cod'];
            $password = $_POST['password'];
            
            $usuarioModel = new Usuario();
            
            try {
                if ($usuarioModel->crear($nombre, $cod, $password, $_SESSION['admin_id'])) {
                    $_SESSION['success'] = 'Usuario creado exitosamente';
                } else {
                    $_SESSION['error'] = 'Error al crear el usuario';
                }
            } catch (Exception $e) {
                $_SESSION['error'] = 'Error: El código de usuario ya existe';
            }
            
            header('Location: index.php?controller=admin&action=listarUsuarios');
            exit();
        }
    }
    
    // Listar usuarios creados por este administrador
    public function listarUsuarios() {
        $this->verificarSesion();
        
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->listarPorAdministrador($_SESSION['admin_id']);
        
        require_once 'views/admin/listar_usuarios.php';
    }
}
?>
