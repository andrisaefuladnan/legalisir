<?php
session_start();

// Include koneksi database
include '../includes/db.php';
include 'includes/header.php'; // Header umum untuk halaman admin

$conn = getMySQLiConnection(); // Gunakan fungsi untuk mendapatkan koneksi MySQLi

// Handle form submission untuk menambah arsip
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_arsip'])) {
    $nama_dokumen = $_POST['nama_dokumen'];
    $tanggal_upload = $_POST['tanggal_upload'];
    $keterangan = $_POST['keterangan'];

    // Query untuk menambah arsip
    $stmt = $conn->prepare("INSERT INTO arsip (nama_dokumen, tanggal_upload, keterangan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_dokumen, $tanggal_upload, $keterangan);
    $stmt->execute();
    $stmt->close();

    // Redirect setelah menambah arsip
    header('Location: arsip.php');
    exit;
}

// Fetch data arsip
$result = $conn->query("SELECT * FROM arsip");
?>

<div class="container">
    <h1 class="page-title">Kelola Arsip</h1>

    <!-- Form Tambah Arsip -->
    <div class="card">
        <h2 class="card-title">Tambah Arsip Baru</h2>
        <form method="POST" class="form-arsip">
            <div class="form-group">
                <label for="nama_dokumen">Nama Dokumen</label>
                <input type="text" id="nama_dokumen" name="nama_dokumen" class="form-control" placeholder="Masukkan nama dokumen" required>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" id="tanggal_upload" name="tanggal_upload" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan keterangan arsip"></textarea>
            </div>
            <button type="submit" name="add_arsip" class="btn btn-primary">Tambah Arsip</button>
        </form>
    </div>

    <!-- Tabel Arsip -->
    <div class="card">
        <h2 class="card-title">Daftar Arsip</h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dokumen</th>
                        <th>Tanggal Upload</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nama_dokumen']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_upload']) ?></td>
                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                        <td>
                            <a href="arsip_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="arsip_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus arsip ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php'; // Footer umum untuk halaman admin
?>