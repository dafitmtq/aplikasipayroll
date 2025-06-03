<?php
require_once __DIR__ . '/../config/koneksi.php';

class Perusahaan {
    private $conn;
    private $table = "perusahaan";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function countAll() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByName($keyword) {
    $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword";
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function getById($id) {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

public function create($data)
{
    $query = "INSERT INTO " . $this->table . " (nama, alamat, no_telpon, email) VALUES (:nama, :alamat, :no_telpon, :email)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':alamat', $data['alamat']);
    $stmt->bindParam(':no_telpon', $data['no_telpon']);
    $stmt->bindParam(':email', $data['email']);

    return $stmt->execute();
}

public function update($id, $data) {
    $query = "UPDATE " . $this->table . " SET nama = :nama, alamat = :alamat, no_telpon = :no_telpon, email = :email WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':alamat', $data['alamat']);
    $stmt->bindParam(':no_telpon', $data['no_telpon']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

public function delete($id) {
    // $stmt = $this->conn->prepare("SELECT COUNT(*) FROM karyawan WHERE id = :id");
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM karyawan WHERE id = :id AND :id IS NOT NULL");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        return false; // masih ada karyawan
    }

    // Hapus semua karyawan terkait
    // $stmt = $this->conn->prepare("DELETE FROM karyawan WHERE id = :id");
    // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // $stmt->execute();

    $stmt = $this->conn->prepare("DELETE FROM perusahaan WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // return $stmt->execute();
    // $stmt->execute();
    $result = $stmt->execute();
    if (!$result) { 
    var_dump($stmt->errorInfo()); // Debug SQL errors
}
    return $result;
}




}