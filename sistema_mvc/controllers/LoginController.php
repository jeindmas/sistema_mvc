<?php
require_once 'models/Administrador.php';
require_once 'models/Usuario.php';

class LoginController {
    
    // Mostrar formulario de login
    public function index() {
        // Si ya hay sesión activa, redirigir
        if (isset($_SESSION['admin_id'])) {
            header('Location: index.php?controller=admin&action=dashboard');
            exit();
        }
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=usuario&action=dashboard');
            exit();
        }
        
        require_once 'views/shared/login.php';
    }
    
    // Procesar login
    public function procesar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tipo = $_POST['tipo'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            if ($tipo == 'admin') {
                $adminModel = new Administrador();
                $admin = $adminModel->login($usuario, $password);
                
                if ($admin) {
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_nombre'] = $admin['nombre'];
                    $_SESSION['admin_nic_name'] = $admin['nic_name'];
                    $_SESSION['tipo_usuario'] = 'admin';
                    header('Location: index.php?controller=admin&action=dashboard');
                    exit();
                } else {
                    $_SESSION['error'] = 'Credenciales incorrectas';
                    header('Location: index.php?controller=login&action=index');
                    exit();
                }
            } else {
                $usuarioModel = new Usuario();
                $usuario_data = $usuarioModel->login($usuario, $password);
                
                if ($usuario_data) {
                    $_SESSION['usuario_id'] = $usuario_data['id'];
                    $_SESSION['usuario_nombre'] = $usuario_data['nombre'];
                    $_SESSION['usuario_cod'] = $usuario_data['cod'];
                    $_SESSION['tipo_usuario'] = 'usuario';
                    header('Location: index.php?controller=usuario&action=dashboard');
                    exit();
                } else {
                    $_SESSION['error'] = 'Credenciales incorrectas';
                    header('Location: index.php?controller=login&action=index');
                    exit();
                }
            }
        }
    }
    
    // Cerrar sesión
    public function logout() {
        session_destroy();
        header('Location: index.php?controller=login&action=index');
        exit();
    }
}
?>
