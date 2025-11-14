<?php
session_start();

// Incluir archivos necesarios
require_once 'config/database.php';

// Obtener el controlador y acción de la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Construir el nombre del archivo del controlador
$controllerFile = 'controllers/' . ucfirst($controller) . 'Controller.php';

// Verificar si el archivo existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerObj = new $controllerClass();
    
    // Verificar si el método existe
    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        die("Acción no encontrada");
    }
} else {
    die("Controlador no encontrado");
}
?>
