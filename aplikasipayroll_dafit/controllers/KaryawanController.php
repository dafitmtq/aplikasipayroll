<?php
require_once './models/M_karyawan.php';

class KaryawanController {
    private $model;

    public function __construct($db) {
        $this->model = new karyawan($db);
    }

    public function index() {
        $data = $this->model->getAll();
        // include './views/main/karyawan.php';

                // Cek apakah ada parameter pencarian
        $search_nama = isset($_GET['search_nama']) ? trim($_GET['search_nama']) : '';
        $search_perusahaan = isset($_GET['search_perusahaan']) ? $_GET['search_perusahaan'] : '';
        $search_jabatan = isset($_GET['search_jabatan']) ? trim($_GET['search_jabatan']) : '';

        // Jika ada parameter pencarian, gunakan method search
        if (!empty($search_nama) || !empty($search_perusahaan) || !empty($search_jabatan)) {
            $data = $this->model->search($search_nama, $search_perusahaan, $search_jabatan);
            $is_search = true;
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $data = $this->model->getAll();
            $is_search = false;
        }

        // Ambil data untuk dropdown filter
        $perusahaan_list = $this->model->getAllPerusahaan();
        $jabatan_list = $this->model->getUniqueJabatan();

        // Pass data ke view
        include './views/main/karyawan.php';
    }

    // Method untuk handle AJAX search (optional)
    public function ajaxSearch() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search_nama = isset($_POST['search_nama']) ? trim($_POST['search_nama']) : '';
            $search_perusahaan = isset($_POST['search_perusahaan']) ? $_POST['search_perusahaan'] : '';
            $search_jabatan = isset($_POST['search_jabatan']) ? trim($_POST['search_jabatan']) : '';

            $data = $this->model->search($search_nama, $search_perusahaan, $search_jabatan);
            
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'data' => $data,
                'count' => count($data)
            ]);
            exit;
        }
    }
}
