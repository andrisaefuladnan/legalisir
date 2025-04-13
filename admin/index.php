<?php
// Mulai sesi
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Jika belum login, arahkan ke halaman login
    header('Location: login.php');
    exit;
}

// Jika sudah login, arahkan ke dashboard
header('Location: dashboard.php');
exit;
?>