<!-- M_karyawan.php -->

<?php
require_once __DIR__ . '/../config/koneksi.php';

class Karyawan {
    private $conn;
    private $table = "karyawan";

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

    // Method untuk pencarian karyawan
    public function search($nama = '', $perusahaan_id = '', $jabatan = '') {
        $query = "SELECT k.*, p.nama
                  FROM " . $this->table . " k 
                  LEFT JOIN perusahaan p ON k.id = p.id 
                  WHERE 1=1";
        
        $params = array();
        
        // Filter berdasarkan nama
        if (!empty($nama)) {
            $query .= " AND k.nama LIKE :nama";
            $params[':nama'] = '%' . $nama . '%';
        }
        
        // Filter berdasarkan perusahaan
        if (!empty($perusahaan_id)) {
            $query .= " AND k.id = :perusahaan_id";
            $params[':perusahaan_id'] = $perusahaan_id;
        }
        
        // Filter berdasarkan jabatan
        if (!empty($jabatan)) {
            $query .= " AND k.jabatan LIKE :jabatan";
            $params[':jabatan'] = '%' . $jabatan . '%';
        }
        
        $query .= " ORDER BY k.kode_karyawan ASC";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk mendapatkan semua perusahaan (untuk dropdown filter)
    public function getAllPerusahaan() {
        $query = "SELECT id, nama FROM perusahaan ORDER BY nama ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk mendapatkan jabatan yang unik (untuk dropdown filter)
    public function getUniqueJabatan() {
        $query = "SELECT DISTINCT jabatan FROM " . $this->table . " WHERE jabatan IS NOT NULL AND jabatan != '' ORDER BY jabatan ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk mendapatkan data berdasarkan ID
    public function getById($id) {
        $query = "SELECT k.*, p.nama
                  FROM " . $this->table . " k 
                  LEFT JOIN perusahaan p ON k.id = p.id 
                  WHERE k.kode_karyawan = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
