<?php
require_once './models/M_user.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new user();
    }

    public function showLoginForm() {
        include __DIR__ . '/../views/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->model->checkLogin($username, $password);

            if ($user) {
                // session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php?route=dashboard");
                exit;
            } else {
                session_start();
                $_SESSION['error'] = 'Username atau password salah!';
                header("Location: index.php?route=login");
                exit;
            }
        }
    }

//     public function login() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // validasi CSRF
//         $username = trim(htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'));
//         $password = trim($_POST['password'] ?? '');

//         if (empty($username) || empty($password)) {
//             $_SESSION['error'] = 'Username dan password tidak boleh kosong!';
//             header("Location: index.php?route=login");
//             exit;
//         }

//         $user = $this->model->checkLogin($username, $password);

//         if ($user) {
//             $_SESSION['user_id'] = $user['id'];
//             $_SESSION['username'] = $user['username'];
//             $_SESSION['role'] = $user['role'];
//             header("Location: index.php?route=dashboard");
//             exit;
//         } else {
//             $_SESSION['error'] = 'Username atau password salah!';
//             header("Location: index.php?route=login");
//             exit;
//         }
//     }
// }

// public function login() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $username = trim(htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'));
//         $password = trim($_POST['password'] ?? '');
//         // echo "Username: $username, Password: $password<br>";
//         $user = $this->model->checkLogin($username, $password);
//         // var_dump($user); // Periksa apakah user ditemukan
//         exit;
//     }
// }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?route=login");
        exit;
    }
}