<?php
require_once __DIR__ . '/../config/koneksi.php';

class SlipGaji {
    private $conn;
    private $table = "slip_gaji";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function countAllBulanIni() {
        $bulanIni = date('Y-m');
        $query = "SELECT COUNT(no_ref) as total FROM " . $this->table . " WHERE tgl LIKE :bulan";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':bulan', "$bulanIni%");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    public function totalBulanIni() {
        $bulanIni = date('Y-m');
        $query = "SELECT SUM(total_gaji) as total FROM " . $this->table . " WHERE tgl LIKE :bulan";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':bulan', "$bulanIni%");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }
}
