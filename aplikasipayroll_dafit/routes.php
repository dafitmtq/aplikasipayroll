<?php

require_once './config/koneksi.php';
require_once './controllers/AuthController.php';
require_once './controllers/PerusahaanController.php';
require_once './controllers/KaryawanController.php';
require_once './controllers/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/aplikasipayroll_dafit/controllers/DashboardController.php';

$database = new Database();
$conn = $database->getConnection();
$route = $_GET['route'] ?? '';

// Tangkap URL path
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// // Definisikan base path (sesuaikan dengan nama folder proyek Anda)
// $basePath = '/aplikasipayroll_dafit';

// // Hapus base path dari URI
// $uri = str_replace($basePath, '', $uri);
// $uri = rtrim($uri, '/'); // Hilangkan trailing slash jika ada

// Debugging: Tampilkan nilai $uri
// echo "Debug: URI = '$uri'<br>";

// Routing
switch ($route) {
    case 'login':
        $auth = new AuthController();
        $auth->showLoginForm();
        break;

    case 'do_login':
        $auth = new AuthController();
        $auth->login();
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    case 'dashboard':
    default:
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'perusahaan':
        $controller = new PerusahaanController($conn);
        $controller->index();
        break;
        
    case 'perusahaan/create':
        $controller = new PerusahaanController($conn);
        $controller->create();
        break;
        
    case 'perusahaan/store':
        $controller = new PerusahaanController($conn);
        $controller->store();
        break;
        
    case 'perusahaan/edit':
        $controller = new PerusahaanController($conn);
        $controller->edit();
        break;
        
    case 'perusahaan/update':
        $controller = new PerusahaanController($conn);
        $controller->update();
        break;

    case 'perusahaan/delete':
        $controller = new PerusahaanController($conn);
        $controller->delete();
        break;

    case 'karyawan':
        $controller = new KaryawanController($conn);
        $controller->index();
        break;

    case 'user':
        $controller = new UserController($conn);
        $controller->index();
        break;
        
}
// switch ($route) {
//     case 'perusahaan':
//         $controller = new PerusahaanController($conn);
//         $controller->index();
//         break;
//     }

// switch ($uri) {
//     // case '/dashboard':
//     case '/index.php': // Rute untuk index.php
//         // require_once __DIR__ . '/controllers/DashboardController.php';
//         $controller = new DashboardController();
//         $controller->index();
//         break;

//     // default:
//     //     echo "<h1>404 - Halaman tidak ditemukan</h1>";
//     //     break;
// }
// ?>