<?php
// class Database {
//     private $host = "localhost";
//     private $db_name = "payroll_db";
//     private $username = "root";
//     private $password = "";
//     public $conn;

//     public function getConnection() {
//         $this->conn = null;

//         try {
//             $this->conn = new PDO(
//                 "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
//                 $this->username, 
//                 $this->password
//             );
//             $this->conn->exec("set names utf8");
//         } catch(PDOException $exception) {
//             echo "Koneksi gagal: " . $exception->getMessage();
//         }

//         return $this->conn;
//     }
// }

class Database {
    private $host = "localhost";
    private $db_name = "payroll_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}