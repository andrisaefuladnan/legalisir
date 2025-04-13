<?php
include '../includes/db.php';

$stmt = $pdo->query("SELECT * FROM documents WHERE status = 'Pending'");
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masuk</title>
</head>
<body>
    <h1>Dokumen Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['nisn'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="verifikasi.php?id=<?= $row['id'] ?>">Verifikasi</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>