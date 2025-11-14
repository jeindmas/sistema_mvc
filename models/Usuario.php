<?php
class Usuario {
    private $conn;
    
    public function __construct() {
        $this->conn = getConnection();
    }
    
    // Crear nuevo usuario
    public function crear($nombre, $cod, $password, $admin_creador_id) {
        $sql = "INSERT INTO usuarios (nombre, cod, password, admin_creador_id) 
                VALUES (:nombre, :cod, :password, :admin_creador_id)";
        $stmt = $this->conn->prepare($sql);
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':cod', $cod);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':admin_creador_id', $admin_creador_id);
        
        return $stmt->execute();
    }
    
    // Verificar login del usuario
    public function login($cod, $password) {
        $sql = "SELECT * FROM usuarios WHERE cod = :cod";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cod', $cod);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }
    
    // Listar usuarios creados por un administrador específico
    public function listarPorAdministrador($admin_id) {
        $sql = "SELECT id, nombre, cod, fecha_creacion 
                FROM usuarios 
                WHERE admin_creador_id = :admin_id 
                ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':admin_id', $admin_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener usuario por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
