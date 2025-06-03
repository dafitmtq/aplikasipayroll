<?php
session_start();
$route = $_GET['route'] ?? '';

// Cek apakah route tidak perlu login
$publicRoutes = ['login', 'do_login'];

if (!in_array($route, $publicRoutes)) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?route=login");
        exit;
    }
}

require_once 'routes.php';
?>

