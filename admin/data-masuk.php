<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require '../includes/db.php'; // Koneksi database

// Ambil semua data dari tabel requests
$stmt = $pdo->query("SELECT * FROM requests ORDER BY submitted_at DESC");
$requests = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masuk - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Data Masuk</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="data-masuk.php">Data Masuk</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Tahun Lulus</th>
                    <th>Ijazah Depan</th>
                    <th>Ijazah Belakang</th>
                    <th>Tanggal Diajukan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $index => $request): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($request['name']) ?></td>
                    <td><?= htmlspecialchars($request['nisn']) ?></td>
                    <td><?= htmlspecialchars($request['graduation_year']) ?></td>
                    <td><a href="../uploads/<?= $request['ijazah_front_path'] ?>" target="_blank">Lihat</a></td>
                    <td><a href="../uploads/<?= $request['ijazah_back_path'] ?>" target="_blank">Lihat</a></td>
                    <td><?= htmlspecialchars($request['submitted_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>