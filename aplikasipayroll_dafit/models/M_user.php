<?php
require_once __DIR__ . '/../config/koneksi.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function checkLogin($username, $password) {
    $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($user); // Periksa hasil query
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

// Mengambil semua data user
    public function getAllUsers() {
        $query = "SELECT id, username, nama, role FROM " . $this->table . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil user berdasarkan ID
    public function getUserById($id) {
        $query = "SELECT id, username, nama, role FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambah user baru
    public function insertUser($data) {
        $query = "INSERT INTO " . $this->table . " (username, password, nama, role) VALUES (:username, :password, :nama, :role)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':username', $data['username']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':role', $data['role']);
        return $stmt->execute();
    }

    // Update user
    public function updateUser($id, $data) {
        if (isset($data['password']) && !empty($data['password'])) {
            $query = "UPDATE " . $this->table . " SET username = :username, password = :password, nama = :nama, role = :role WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':password', $data['password']);
        } else {
            $query = "UPDATE " . $this->table . " SET username = :username, nama = :nama, role = :role WHERE id = :id";
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':username', $data['username']);
        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':role', $data['role']);
        return $stmt->execute();
    }

    // Hapus user
    public function deleteUser($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    // Cek username sudah ada atau belum
    public function checkUsernameExists($username, $excludeId = null) {
        if ($excludeId) {
            $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE username = :username AND id != :exclude_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':exclude_id', $excludeId);
        } else {
            $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE username = :username";
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Search user
    public function searchUsers($keyword) {
        $query = "SELECT id, username, nama, role FROM " . $this->table . " WHERE username LIKE :keyword OR nama LIKE :keyword ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindValue(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
