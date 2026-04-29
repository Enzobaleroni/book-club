<?php
require_once __DIR__ . '/../config/Database.php';
 
class cliente {
    public $id;
    public $name;
    public $email;
    public $password;
 
    // Buscar todos os clientes
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
 
    // Buscar um usuário por ID
    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('cliente');
    }
 
    // Buscar um usuário por email
    public static function findByEmail($email) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM cliente WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchObject('cliente');
    }
 
    // Criar novo usuário
    public function save() {
        $db = Database::connect();
        if (isset($this->id)) {
            // update
            $stmt = $db->prepare("UPDATE cliente SET name = ?, email = ?, password = ? WHERE id = ?");
            return $stmt->execute([$this->name, $this->email, $this->password, $this->id]);
        } else {
            // insert
            $stmt = $db->prepare("INSERT INTO cliente (name, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$this->name, $this->email, $this->password]);
        }
    }
 
    // Deletar usuário
    public function delete() {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM cliente WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
 
    // Contar usuários
    public static function count() {
        $db = Database::connect();
        $stmt = $db->query("SELECT COUNT(*) as total FROM cliente");
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }
}