<?php
class Administrador {
    private $conn;
    
    public function __construct() {
        $this->conn = getConnection();
    }
    
    // Verificar login del administrador
    public function login($nic_name, $password) {
        $sql = "SELECT * FROM administradores WHERE nic_name = :nic_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nic_name', $nic_name);
        $stmt->execute();
        
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
    
    // Obtener administrador por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM administradores WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Listar todos los administradores
    public function listarTodos() {
        $sql = "SELECT id, nic_name, nombre, cedula, fecha_creacion FROM administradores ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
