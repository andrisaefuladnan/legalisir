<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard-lux.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <section class="dashboard-section">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang di Panel Admin. Pilih menu untuk melanjutkan.</p>

            <div class="luxury-grid">
                <div class="luxury-card">
                    <a href="../index.php">
                        <div class="luxury-content">
                            <img src="../assets/icons/3d-home.svg" alt="Beranda Icon" class="icon-3d">
                            <div class="luxury-text">
                                <h3>Beranda</h3>
                                <p>Lihat halaman utama situs.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="luxury-card">
                    <a href="data-masuk.php">
                        <div class="luxury-content">
                            <img src="../assets/icons/3d-inbox.svg" alt="Data Masuk Icon" class="icon-3d">
                            <div class="luxury-text">
                                <h3>Data Masuk</h3>
                                <p>Kelola data legalisir yang masuk.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="luxury-card">
                    <a href="arsip.php">
                        <div class="luxury-content">
                            <img src="../assets/icons/3d-archive.svg" alt="Arsip Icon" class="icon-3d">
                            <div class="luxury-text">
                                <h3>Arsip</h3>
                                <p>Kelola arsip data legalisir.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="luxury-card">
                    <a href="statistik.php">
                        <div class="luxury-content">
                            <img src="../assets/icons/3d-statistics.svg" alt="Statistik Icon" class="icon-3d">
                            <div class="luxury-text">
                                <h3>Statistik</h3>
                                <p>Lihat statistik data legalisir.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="luxury-card">
                    <a href="user.php">
                        <div class="luxury-content">
                            <img src="../assets/icons/3d-users.svg" alt="User Icon" class="icon-3d">
                            <div class="luxury-text">
                                <h3>User</h3>
                                <p>Kelola data pengguna atau admin.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>