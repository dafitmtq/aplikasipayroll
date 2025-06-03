<?php
require_once './models/M_user.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new user();
    }

    // Halaman utama kelola user
    public function index() {
        $users = $this->userModel->getAllUsers();
        $current_route = 'kelolaUser';
        
        include __DIR__ . '/../views/layout/sidebar.php';
        include __DIR__ . '/../views/main/user.php';
        include __DIR__ . '/../views/layout/footer.php';
    }

    // Tambah user baru
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $nama = $_POST['nama'] ?? '';
            $role = $_POST['role'] ?? 'staff';

            // Validasi
            if (empty($username) || empty($password) || empty($nama)) {
                $_SESSION['error'] = 'Semua field harus diisi!';
                header('Location: index.php?route=kelolaUser');
                exit;
            }

            // Cek username sudah ada
            if ($this->userModel->checkUsernameExists($username)) {
                $_SESSION['error'] = 'Username sudah digunakan!';
                header('Location: index.php?route=kelolaUser');
                exit;
            }

            $data = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama' => $nama,
                'role' => $role
            ];

            if ($this->userModel->insertUser($data)) {
                $_SESSION['success'] = 'User berhasil ditambahkan!';
            } else {
                $_SESSION['error'] = 'Gagal menambahkan user!';
            }
        }
        header('Location: index.php?route=kelolaUser');
        exit;
    }

    // Update user
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $nama = $_POST['nama'] ?? '';
            $role = $_POST['role'] ?? 'staff';

            // Validasi
            if (empty($username) || empty($nama)) {
                $_SESSION['error'] = 'Username dan nama harus diisi!';
                header('Location: index.php?route=kelolaUser');
                exit;
            }

            // Cek username sudah ada (kecuali untuk user yang sedang diedit)
            if ($this->userModel->checkUsernameExists($username, $id)) {
                $_SESSION['error'] = 'Username sudah digunakan!';
                header('Location: index.php?route=kelolaUser');
                exit;
            }

            $data = [
                'username' => $username,
                'nama' => $nama,
                'role' => $role
            ];

            // Jika password diisi, update password
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            if ($this->userModel->updateUser($id, $data)) {
                $_SESSION['success'] = 'User berhasil diupdate!';
            } else {
                $_SESSION['error'] = 'Gagal mengupdate user!';
            }
        }
        header('Location: index.php?route=kelolaUser');
        exit;
    }

    // Hapus user
    public function delete() {
        $id = $_GET['id'] ?? 0;
        
        if ($this->userModel->deleteUser($id)) {
            $_SESSION['success'] = 'User berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Gagal menghapus user!';
        }
        
        header('Location: index.php?route=kelolaUser');
        exit;
    }

    // Get user data untuk edit (AJAX)
    public function getUserData() {
        $id = $_GET['id'] ?? 0;
        $user = $this->userModel->getUserById($id);
        
        header('Content-Type: application/json');
        echo json_encode($user);
        exit;
    }

    // Search user
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        
        if ($keyword) {
            $users = $this->userModel->searchUsers($keyword);
        } else {
            $users = $this->userModel->getAllUsers();
        }
        
        $current_route = 'kelolaUser';
        
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/layout/sidebar.php';
        include __DIR__ . '/../views/main/kelolaUser.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
}