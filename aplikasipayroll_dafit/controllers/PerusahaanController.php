<?php
require_once './models/M_perusahaan.php';

class PerusahaanController {
    private $model;

    public function __construct($db) {
        $this->model = new perusahaan($db);
    }

    public function index() {
        $data = $this->model->getAll();
        $keyword = isset($_GET['search']) ? $_GET['search'] : null;

        if ($keyword) {
            $data = $this->model->searchByName($keyword);
        } else {
            $data = $this->model->getAll();
    }

        include './views/main/perusahaan.php';
    }

    public function create() {
        include './views/main/perusahaan_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'] ?? '',
                'alamat' => $_POST['alamat'] ?? '',
                'no_telpon' => $_POST['no_telpon'] ?? '',
                'email' => $_POST['email'] ?? ''
            ];

            // Validasi
            if (empty($data['nama']) || empty($data['alamat']) || empty($data['no_telpon']) || empty($data['email'])) {
                $_SESSION['error'] = 'Semua field wajib diisi!';
                header('Location: index.php?route=perusahaan/create');
                exit;
            }

            // Periksa format email
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Format email tidak valid!';
                header('Location: index.php?route=perusahaan/create');
                exit;
            }

            $result = $this->model->create($data);

            if ($result) {
                $_SESSION['success'] = 'Data perusahaan berhasil ditambahkan.';
                header('Location: index.php?route=perusahaan');
                exit;
            } else {
                $_SESSION['error'] = 'Gagal menambahkan data perusahaan.';
                header('Location: index.php?route=perusahaan/create');
                exit;
            }
        }
    }

    public function edit() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "ID tidak ditemukan.";
        return;
    }

    $perusahaan = $this->model->getById($id);

    if (!$perusahaan) {
        echo "Data tidak ditemukan.";
        return;
    }

    include './views/main/perusahaan_edit.php';
}

    public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $data = [
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'no_telpon' => $_POST['no_telpon'],
            'email' => $_POST['email'],
        ];

        $result = $this->model->update($id, $data);

        if ($result) {
                // Simpan pesan sukses ke session
                $_SESSION['success'] = "Update data berhasil!";
                header("Location: index.php?route=perusahaan");
                exit;
            } else {
                echo "Gagal mengupdate data. Silakan coba lagi.";
            }
    }
}

public function delete()
{
    if (!isset($_GET['id'])) {
        $_SESSION['error'] = 'ID perusahaan tidak ditemukan.';
        header('Location: index.php?route=perusahaan');
        exit;
    }

    $id = (int)$_GET['id'];
    include_once './models/M_perusahaan.php';
    $model = new Perusahaan($this->model);

    try {
        $result = $model->delete($id);

        if ($result) {
            $_SESSION['success'] = 'Data perusahaan berhasil dihapus.';
        } else {
            $_SESSION['error'] = 'Gagal menghapus. Pastikan tidak ada karyawan di perusahaan ini!';
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Terjadi kesalahan: ' . $e->getMessage();
    }

    header('Location: index.php?route=perusahaan');
    exit;
}

}
