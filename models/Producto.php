<?php
class Producto {
    private $conn;
    
    public function __construct() {
        $this->conn = getConnection();
    }
    
    // Crear nuevo producto
    public function crear($nombre, $serial, $usuario_creador_id) {
        $sql = "INSERT INTO productos (nombre, serial, usuario_creador_id) 
                VALUES (:nombre, :serial, :usuario_creador_id)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':serial', $serial);
        $stmt->bindParam(':usuario_creador_id', $usuario_creador_id);
        
        return $stmt->execute();
    }
    
    // Listar productos creados por un usuario específico
    public function listarPorUsuario($usuario_id) {
        $sql = "SELECT id, nombre, serial, fecha_creacion 
                FROM productos 
                WHERE usuario_creador_id = :usuario_id 
                ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener producto por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
